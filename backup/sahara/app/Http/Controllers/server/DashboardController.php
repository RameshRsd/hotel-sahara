<?php

namespace App\Http\Controllers\server;
use App\Customer;
use App\District;
use App\Floor;
use App\RoomBook;
use App\RoomCheck;
use App\RoomType;
use App\Server;
use App\User;
use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends ServerController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        
        $this->data('userData', User::all());
        $this->data('RoomData', Room::orderBy('room_no')->get());
        $this->data('FloorData', Floor::all());
        $this->data('RoomTYpeData', RoomType::all());
        $this->data('customer', Customer::all());
        $this->data('booked', RoomBook::all());
        $this->data('server', Server::all());
        $this->data('district', District::all());
        $this->data('roomCheck', RoomCheck::orderBy('id', 'DESC')->get());
        $this->data('title',$this->title('Dashboard'));

        return view($this->pagePath.'Admin.index',$this->data);
    }
}

