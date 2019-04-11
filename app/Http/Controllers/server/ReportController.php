<?php

namespace App\Http\Controllers\server;

use App\Customer;
use App\District;
use App\Location;
use App\Room;
use App\RoomCheck;
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
    public function roomWise()
    {
        $this->data('title', $this->title('District Wist Guest Status'));
        $this->data('District', District::orderBy('name')->get());
        $this->data('server', Server::all());
        $this->data('RoomDataValue', Room::all());
        $this->data('RoomData', Room::all());
        $this->data('RoomCheck', RoomCheck::all());
        $this->data('codeData', Server::all());
        $roomSum = Room::all()->count();
        return view($this->pagePath . 'Report.roomWise', $this->data)->with('roomSum', $roomSum);
    }
    public function dateWiseRoomSales(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('title', $this->title('District Wist Guest Status'));
            $this->data('District', District::orderBy('name')->get());
            $this->data('server', Server::all());
            $this->data('RoomDataValue', Room::all());
            $this->data('RoomData', Room::all());
            $this->data('RoomCheck', RoomCheck::all());
            $this->data('codeData', Server::all());
            $roomSum = Room::all()->count();
            return view($this->pagePath . 'Report.roomWise', $this->data)->with('roomSum', $roomSum);
        }
        if ($request->isMethod('post')) {
            $RoomData = RoomCheck::orderBy('date','ASC');
            if (\request('date1') && \request('date2')) {

                $fromDate = \request('date1');
                $toDate   = \request('date2');
                $RoomData->whereRaw("date >= ? AND date <= ?",
                    array($fromDate, $toDate)
                )->get();
            }elseif(\request('date2')){
                $fromDate = \request('date1');
                $toDate   = \request('date2');
                $RoomData->whereRaw("date >= ? AND date <= ?",
                    array($fromDate." 00:00:00", $toDate." 23:59:59")
                )->get();
            }

            else{
                $RoomData->where('date', 'like', '%' . \request('date1') . '%');
            }
//            if (\request('room_id')) {
//                $RoomData->where('room_id',\request('room_id'));
//            }
            if (\request('year')) {
                $RoomData->where('date', 'like', '%' . \request('year') . '%');
            }
            $RoomData = $RoomData->paginate(10000);

//            $countRoom = $RoomData->count();
            $this->data('userData', User::all());
            $this->data('RoomDataValue', Room::orderBy('room_no')->get());
            $this->data('roomCheck', RoomCheck::all());
            $this->data('customer', Customer::all());
            $this->data('districtData', District::all());
            $this->data('server', Server::all());
            $this->data('locationData', Location::all());
            $this->data('zoneData', Zone::all());
            return view($this->pagePath.'Report.dateWiseRoomSales',compact('RoomData'),$this->data);

        }


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
