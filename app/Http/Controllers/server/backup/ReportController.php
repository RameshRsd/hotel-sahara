<?php

namespace App\Http\Controllers\server;

use App\Customer;
use App\District;
use App\Location;
use App\User;
use App\Server;
use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends ServerController
{

    public function Report()
    {
            $this->data('title', $this->title('Report-Analysis-Section'));
            $this->data('server', Server::all());
            $this->data('codeData', Server::all());
            return view($this->pagePath . 'Report.Report', $this->data);

    }
    public function districtGuest()
    {
            $this->data('title', $this->title('District Wist Guest Status'));
            $this->data('District', District::orderBy('name')->get());
            $this->data('server', Server::all());
            $this->data('codeData', Server::all());
            return view($this->pagePath . 'Report.districtGuest', $this->data);

    }
    public function districtWiseGuest(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->route('districtGuest');
        }
        if ($request->isMethod('post')) {
            $customerData = Customer::orderBy('name');
            if (\request('district_id')){
                $customerData->where('district_id',\request('district_id'));
            }
            $this->data('userData', User::all());
            $this->data('District', District::all());
            $this->data('locationData', Location::all());
            $this->data('server', Server::all());
            $this->data('customerData', Customer::all());
            $customerData = $customerData->paginate(500);
            $this->data('title', $this->title('District Wist Guest Status'));
            return view($this->pagePath.'Report.districtWiseGuest',compact('customerData'),$this->data);


        }

    }

}
