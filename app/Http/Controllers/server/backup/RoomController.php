<?php

namespace App\Http\Controllers\server;

use App\Country;
use App\District;
use App\Floor;
use App\Location;
use App\Room;
use App\RoomBook;
use App\RoomCheck;
use App\RoomType;
use App\Server;
use App\User;
use App\Customer;
use App\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RoomController extends ServerController
{

    public function addRoom(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'room_no' => 'required|unique:rooms,room_no',
                'floor_id' => 'required',
                'room_type_id' => 'required',
            ]);


            $data['floor'] = $request->floor;
            $data['room_no'] = $request->room_no;
            $data['floor_id'] = $request->floor_id;
            $data['room_type_id'] = $request->room_type_id;

            if (Room::create($data)) {
                $this->data('userData', User::all());
                $this->data('server',Server::all());
                $this->data('RoomData', Room::all());
                $this->data('title',$this->title('Dashboard'));
                return redirect()->back()->with('success', 'Room Created');
            }
        }
    }
    public function addRoomType(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
            ]);


            $data['name'] = $request->name;

            if (RoomType::create($data)) {
                $this->data('userData', User::all());
                $this->data('RoomData', Room::all());
                $this->data('server',Server::all());
                $this->data('title',$this->title('Dashboard'));
                return redirect()->back()->with('success', 'Room Type Created');
            }
        }
    }
    public function addRoomFloor(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required',
            ]);


            $data['name'] = $request->name;

            if (Floor::create($data)) {
                $this->data('userData', User::all());
                $this->data('RoomData', Room::all());
                $this->data('server',Server::all());
                $this->data('title',$this->title('Dashboard'));
                return redirect()->back()->with('success', 'Room Floor Created');
            }
        }
    }
    public function RoomStatus($id)
    {
        $this->data('userData', User::all());
        $this->data('title', $this->title('Room Update Controll'));
        $this->data('roomDefaultData',Room::findOrFail($id));
        $this->data('roomData',Room::all());
        $this->data('roomBook',RoomBook::all());
        $this->data('server',Server::all());
        $this->data('CustomeData',Customer::orderBy('id', 'DESC')->get());
        return view($this->pagePath.'Customer.RoomStatus',$this->data);
    }

    public function roomBook()
    {
        $this->data('userData', User::all());
        $this->data('bookData', Room::all());
        $this->data('roomTypeData', RoomType::all());
        $this->data('server',Server::all());
        $this->data('roomFloor', Floor::all());
        $this->data('roomData',RoomBook::orderBy('id', 'DESC')->get());
        $this->data('CustomeData',Customer::orderBy('id', 'DESC')->get());;
        $this->data('title', $this->title('Room Book Controll'));
        return view($this->pagePath.'Customer.roomBook',$this->data);
    }
    public function roomCheck(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('userData', User::all());
            $this->data('RoomData', Room::orderBy('room_no')->get());
            $this->data('FloorData', Floor::all());
            $this->data('RoomTYpeData', RoomType::all());
            $this->data('customer', Customer::orderBy('name')->get());
            $this->data('districtData', District::all());
            $this->data('server', Server::all());
            $this->data('locationData', Location::all());
            $this->data('zoneData', Zone::all());
            $this->data('countryData', Country::all());
            $this->data('roomCheck', RoomCheck::orderBy('date', 'DESC')->paginate(100));

            $this->data('title', $this->title('Room Check Controll'));
            return view($this->pagePath . 'Customer.roomCheck', $this->data);
        }
        if($request->isMethod('post')) {

            $roomCheck = RoomCheck::orderBy('date','ASC');
            if (\request('date1') && \request('date2')) {

                $fromDate = \request('date1');
                $toDate   = \request('date2');
                    $roomCheck->whereRaw("date >= ? AND date <= ?",
                    array($fromDate, $toDate)
                )->get();
            }elseif(\request('date2')){
                $fromDate = \request('date1');
                $toDate   = \request('date2');
                $roomCheck->whereRaw("date >= ? AND date <= ?",
                    array($fromDate." 00:00:00", $toDate." 23:59:59")
                )->get();
            }

            else{
                $roomCheck->where('date', 'like', '%' . \request('date1') . '%');
            }
            if (\request('name')) {
                $roomCheck->where('customer_id',\request('name'));
            }
            if (\request('room_id')) {
                $roomCheck->where('room_id',\request('room_id'));
            }
            if (\request('year')) {
                $roomCheck->where('date', 'like', '%' . \request('year') . '%');
            }
            $roomCheck = $roomCheck->paginate(10000);
            $this->data('userData', User::all());
            $this->data('RoomData', Room::orderBy('room_no')->get());
            $this->data('FloorData', Floor::all());
            $this->data('RoomTYpeData', RoomType::all());
            $this->data('roomCheck', RoomCheck::all());
            $this->data('customer', Customer::all());
            $this->data('districtData', District::all());
            $this->data('server', Server::all());
            $this->data('locationData', Location::all());
            $this->data('zoneData', Zone::all());
            $this->data('countryData', Country::all());
            return view($this->pagePath.'Customer.roomCheck',compact('roomCheck'),$this->data);
        }
    }

    public function updateRoom(Request $request, $id)
    {

        $this->validate($request, [
            'customer_name' => 'required',
        ]);


        $data['user_id'] = $request->user_id;
        $data['customer_name'] = $request->customer_name;
        $data['phone'] = $request->phone;
        $data['male'] = $request->male;
        $data['relation'] = $request->relation;
        $data['purpose'] = $request->purpose;
        $data['female'] = $request->female;
        $data['time'] = $request->time;
        $data['date'] = $request->date;
        $data['room_id'] = $request->room_id;

        if (RoomBook::create($data)) {
            $this->data('userData', User::all());
            $this->data('server', Server::all());
            $this->data('RoomData', Room::all());
            $this->data('title', $this->title('Dashboard'));
        }
        $Room = Room::findOrFail($id);
        $Room->room_status = \request('room_status');
        $Room->date = \request('date');

        $Room->save();
            return redirect()->route('login')->with('success', 'Room Booked');
    }
    public function updateRoomCheck(Request $request, $id)
    {

            $this->validate($request, [
                'customer_id' => 'required',
                'user_id' => 'required',
            ]);


            $data['user_id'] = $request->user_id;
            $data['customer_id'] = $request->customer_id;
            $data['time'] = $request->time;
            $data['date'] = $request->date;
            $data['room_id'] = $request->room_id;
            $data['male'] = $request->male;
            $data['female'] = $request->female;
            $data['relation'] = $request->relation;
            $data['purpose'] = $request->purpose;
            $data['remarks'] = $request->remarks;
            $data['total_transaction'] = $request->total_transaction;
            $data['guest_paid'] = $request->guest_paid;
            $data['guest_due'] = $request->guest_due;
            $data['guest_discount'] = $request->guest_discount;

            if (RoomCheck::create($data)) {
                $this->data('userData', User::all());
                $this->data('server', Server::all());
                $this->data('RoomData', Room::all());
                $this->data('title', $this->title('Dashboard'));
            }
        $this->validate($request, [
            'user_id' => 'required',
        ]);
        $Room = Room::findOrFail($id);
        $Room->room_status = \request('room_status');
        $Room->date = \request('date');
        $Room->customer_id = \request('customer_id');

        $Room->save();

            return redirect()->route('login')->with('success', 'Room Checked');
    }
    public function updateRoomSts(Request $request, $id)
    {
        $Room = Room::findOrFail($id);
        $Room->room_status = \request('room_status');
        $Room->date = \request('date');
        $Room->customer_id = \request('customer_id');

        $Room->save();

        return redirect()->back()->with('success', 'Room Checked Out');
    }

    public function roomView()
    {
        $this->data('userData', User::all());
        $this->data('floorData', Floor::orderBy('name')->get());
        $this->data('server', Server::all());
        $this->data('roomData',Room::orderBy('room_no')->get());
        $this->data('roomTypeData',RoomType::all());
        $this->data('title', $this->title('Room Controll Section'));
        return view($this->pagePath.'Customer.roomView',$this->data);
    }

    public function editRoom($id)
    {
        $this->data('userData', User::all());
        $this->data('userData', User::all());
        $this->data('server', Server::all());
        $this->data('FloorData', Floor::all());
        $this->data('roomData',Room::findOrFail($id));
        $this->data('RoomTYpeData',RoomType::all());
        $this->data('title', $this->title('Room Controll'));
        return view($this->pagePath.'Customer.Room.editRoom',$this->data);
    }
    public function editRoomType($id)
    {
        $this->data('userData', User::all());
        $this->data('userData', User::all());
        $this->data('server', Server::all());
        $this->data('FloorData', Floor::all());
        $this->data('roomData',Room::all());
        $this->data('RoomTYpeData',RoomType::findOrFail($id));
        $this->data('title', $this->title('Room Controll'));
        return view($this->pagePath.'Customer.Room.editRoomType',$this->data);
    }
    public function updateRoomType(Request $request, $id)
    {
        $room = RoomType::findOrFail($id);
        $requestData = \request()->all();
        $room->update($requestData);
        return redirect()->route('roomView')->with('success', 'Record Updated');
    }
    public function editRoomFloor($id)
    {
        $this->data('userData', User::all());
        $this->data('userData', User::all());
        $this->data('server', Server::all());
        $this->data('FloorData', Floor::findOrFail($id));
        $this->data('roomData',Room::all());
        $this->data('RoomTYpeData',RoomType::all());
        $this->data('title', $this->title('Room Controll'));
        return view($this->pagePath.'Customer.Room.editRoomFloor',$this->data);
    }
    public function updateRoomFloor(Request $request, $id)
    {
        $room = Floor::findOrFail($id);
        $requestData = \request()->all();
        $room->update($requestData);
        return redirect()->route('roomView')->with('success', 'Record Updated');
    }
    public function updateRoomNumber(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        $requestData = \request()->all();
        $room->update($requestData);
        return redirect()->route('roomView')->with('success', 'Record Updated');
    }
    public function editBill($id)
    {
        $this->data('userData', User::all());
        $this->data('RoomData', Room::all());
        $this->data('customer', Customer::all());
        $this->data('districtData', District::all());
        $this->data('locationData', Location::all());
        $this->data('zoneData', Zone::all());
        $this->data('countryData', Country::all());
        $this->data('guestData', RoomCheck::all());
        $this->data('server', Server::all());
        $this->data('roomData',RoomCheck::findOrFail($id));
        $this->data('title', $this->title('Customer Bill Controll'));
        return view($this->pagePath.'Customer.Room.editBill',$this->data);
    }
    public function updateBill(Request $request, $id)
    {
        $roomCheck = RoomCheck::findOrFail($id);
        $roomCheck->total_transaction = \request('total_transaction');
        $roomCheck->guest_paid = \request('guest_paid');
        $roomCheck->guest_due = \request('guest_due');
        $roomCheck->guest_discount = \request('guest_discount');
        $roomCheck->remarks = \request('remarks');

        $roomCheck->save();
        return redirect()->route('roomCheck')->with('success', 'Record Updated');
    }

    public function destroy($id)
    {
        $roomView = Room::findOrFail($id);

        $roomView->delete();

        return redirect()->route('roomView')->with('success', 'Record Deleted');

    }
    public function destroyType($id)
    {
        $roomView = RoomType::findOrFail($id);

        $roomView->delete();

        return redirect()->back()->with('success', 'Record Deleted');

    }
    public function destroyFloor($id)
    {
        $roomView = Floor::findOrFail($id);

        $roomView->delete();

        return redirect()->back()->with('success', 'Record Deleted');

    }
    public function destroyBookItm($id)
    {
        $roomView = RoomBook::findOrFail($id);

        $roomView->delete();

        return redirect()->back()->with('success', 'Record Deleted');

    }
    public function destroyBook($room_id)
    {
        $room = Room::findOrFail($room_id);
        $requestData = \request()->all();
        $room->update($requestData);
        return redirect()->back()->with('success', 'Record Updated');

    }
    public function destroyCheck($id)
    {
        $roomCheck = RoomCheck::findOrFail($id);
        $roomCheck->delete();
        return redirect()->back()->with('success', 'Record Deleted');

    }

}
