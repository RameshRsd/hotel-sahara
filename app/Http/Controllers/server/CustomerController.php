<?php

namespace App\Http\Controllers\server;

use App\Country;
use App\District;
use App\Room;
use App\RoomCheck;
use App\Server;
use App\User;
use App\Location;
use App\Customer;
use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends ServerController
{

    public function addCustomer(Request $request)
    {

        if ($request->isMethod('get')) {
            $this->data('title', $this->title('Customer Entry Controll'));
            $this->data('server', Server::all());
            $this->data('customer', Customer::orderBy('id', 'DESC')->get());
            $country_list=Country::all();//get data from table
            return view($this->pagePath . 'Customer.addCustomer', $this->data)->with('country_list', $country_list);
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
                'nationality' => 'required',
                'customer_id_no' => 'required|unique:customers,customer_id_no',
                'contact_1' => 'required',
//                'photo' => 'mimes:jpg,png,jpeg,gif',
//                'customer_doc' => 'mimes:jpg,png,jpeg,gif,pdf',
            ]);


            if (($request->hasFile('photo'))) {
                $image = $request->file('photo');
                $ext = $image->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('images/Customer/');
                if ($image->move($uploadPath, $imageName)) {
                    $data['photo'] = $imageName;
                }
            }
            if (($request->hasFile('customer_doc'))) {
                $customer_doc = $request->file('customer_doc');
                $ext = $customer_doc->getClientOriginalExtension();
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('images/Customer/');
                if ($customer_doc->move($uploadPath, $imageName)) {
                    $data['customer_doc'] = $imageName;
                }


            }

            $data['user_id'] = $request->user_id;
            $data['country_id'] = $request->country_id;
            $data['name'] = $request->name;
            $data['gender'] = $request->gender;
            $data['nationality'] = $request->nationality;
            $data['id_type'] = $request->id_type;
            $data['zone_id'] = $request->zone_id;
            $data['district_id'] = $request->district_id;
            $data['location_id'] = $request->location_id;
            $data['ward_no'] = ($request->ward_no);
            $data['tole'] = $request->tole;
            $data['customer_id_no'] = $request->customer_id_no;
            $data['contact_1'] = $request->contact_1;
            $data['contact_2'] = $request->contact_2;
            $data['email'] = $request->email;
            $data['fb_link'] = $request->fb_link;

            if (Customer::create($data)) {
                $this->data('userData', User::All());
                return redirect()->route('addCustomer')->with('success', 'Record Saved Successfully');
            }
        }
    }
    public function viewCustomer(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('userData', User::all());
            $this->data('districtData', District::orderBy('name')->get());
            $this->data('locationData', Location::all());
            $this->data('zoneData', Zone::all());
            $this->data('server', Server::all());
            $this->data('countryData', Country::all());
			$customerData = Customer::orderBy('id', 'DESC')->paginate(30);
            return view($this->pagePath.'Customer.viewCustomer',$this->data,compact('customerData'));
        }
        if($request->isMethod('post')){

            $customerData = Customer::orderBy('name');
            if (\request('name')){
                $customerData->where('name','like','%'.\request('name').'%');
            }
            if (\request('id_no')){
                $customerData->where('customer_id_no',\request('id_no'));
            }
            if (\request('contact_1')){
                $customerData->where('contact_1','like','%'.\request('contact_1').'%');
            }
            if (\request('district_id')){
                $customerData->where('district_id',\request('district_id'));
            }
            $this->data('userData', User::all());
            $this->data('districtData', District::orderBy('name')->get());
            $this->data('locationData', Location::all());
            $this->data('zoneData', Zone::all());
            $this->data('countryData', Country::all());
            $this->data('server', Server::all());
            $this->data('customerData', Customer::orderBy('id', 'DESC')->get());
            $customerData = $customerData->paginate(500);
            return view($this->pagePath.'Customer.viewCustomer',compact('customerData'),$this->data);

        }
    }
    public function editCustomer($id)
    {
        $this->data('userData', User::all());
        $this->data('districtData', District::orderBy('name')->get());
        $this->data('locationData', Location::orderBy('name')->get());
        $this->data('server', Server::all());
        $this->data('roomData', Room::all());
        $this->data('roomCheck', RoomCheck::where('customer_id',$id)->orderBy('id','DESC')->get());
        $this->data('total_bill', RoomCheck::where('customer_id',$id)->sum('total_transaction'));
        $this->data('total_disc', RoomCheck::where('customer_id',$id)->sum('guest_discount'));
        $this->data('total_due', RoomCheck::where('customer_id',$id)->sum('guest_due'));
        $this->data('total_paid', RoomCheck::where('customer_id',$id)->sum('guest_paid'));
        $this->data('zoneData', Zone::all());
        $this->data('title', $this->title('Customer Update Controll'));
//        $total_bill = DB::table('room_checks')->where('customer_id', $id)->sum('total_transaction');
        $country_list=Country::all();//get data from table
        $this->data('updateCustomer',Customer::findOrFail($id));
        return view($this->pagePath.'Customer.editCustomer',$this->data)->with('country_list', $country_list);
    }
    public function viewCustomerDetails($id)
    {
        $this->data('userData', User::all());
        $this->data('countryData', Country::all());
        $this->data('districtData', District::orderBy('name')->get());
        $this->data('locationData', Location::orderBy('name')->get());
        $this->data('server', Server::all());
        $this->data('roomData', Room::all());
        $this->data('roomCheck', RoomCheck::where('customer_id',$id)->orderBy('id','DESC')->get());
        $this->data('total_bill', RoomCheck::where('customer_id',$id)->sum('total_transaction'));
        $this->data('total_disc', RoomCheck::where('customer_id',$id)->sum('guest_discount'));
        $this->data('total_due', RoomCheck::where('customer_id',$id)->sum('guest_due'));
        $this->data('total_paid', RoomCheck::where('customer_id',$id)->sum('guest_paid'));
        $this->data('zoneData', Zone::all());
        $this->data('title', $this->title('Customer Update Controll'));
//        $total_bill = DB::table('room_checks')->where('customer_id', $id)->sum('total_transaction');
        $country_list=Country::all();//get data from table
        $this->data('updateCustomer',Customer::findOrFail($id));
        return view($this->pagePath.'Customer.viewCustomerDetails',$this->data)->with('country_list', $country_list);
    }

    public function updateCustomer(Request $request, $id)
    {
        $Customer = Customer::findOrFail($id);
        $Customer->user_id = \request('user_id');
        $Customer->country_id = \request('country_id');
        $Customer->name = \request('name');
        $Customer->gender = \request('gender');
        $Customer->nationality = \request('nationality');
        $Customer->id_type = \request('id_type');
        $Customer->zone_id = \request('zone_id');
        $Customer->district_id = \request('district_id');
        $Customer->location_id = \request('location_id');
        $Customer->ward_no = \request('ward_no');
        $Customer->tole = \request('tole');
        $Customer->customer_id_no = \request('customer_id_no');
        $Customer->contact_1 = \request('contact_1');
        $Customer->contact_2 = \request('contact_2');
        $Customer->email = \request('email');
        $Customer->fb_link = \request('fb_link');

        if($request->hasFile('photo')){
            if (is_file($Customer->photo) && file_exists($Customer->photo)){
                unlink($Customer->photo);
            }
            $filename = time().'.'.request()->file('photo')->getClientOriginalExtension();

            $filename = md5(microtime()) . '.' . $filename;

            request()->file('photo')->move('public/images/Customer/',$filename);
            $Customer->photo =$filename;
        }
        if($request->hasFile('customer_doc')){
            if (is_file($Customer->customer_doc) && file_exists($Customer->customer_doc)){
                unlink($Customer->customer_doc);
            }
            $filename = time().'.'.request()->file('customer_doc')->getClientOriginalExtension();

            $filename = md5(microtime()) . '.' . $filename;

            request()->file('customer_doc')->move('public/images/Customer/',$filename);
            $Customer->customer_doc =$filename;
        }
        $Customer->save();
        return redirect()->route('viewCustomer')->with('success', 'Record Updated');
    }
    public function destroy($id)
    {
        $viewCustomer = Customer::findOrFail($id);

        $viewCustomer->delete();

        return redirect()->route('viewCustomer')->with('success', 'Record Deleted');

    }

    function FindZone(Request $request)
    {
        //if our chosen id and products table prod_cat_id col match the get first 100 data

        //$request->id here is the id of our chosen option id
        $data=Zone::select('name','id')->where('country_id',$request->id)->take(100)->get();
        return response()->json($data);//then sent this data to ajax success

    }
}
