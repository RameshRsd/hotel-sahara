@extends($masterPath.'.master.master')

@section('content')
    @if(Auth::user()->user_status =='1')
                @foreach($server as $codeData)
                @if($codeData->name < date('Y-m-d'))
                <div class="main_container">
                        <div class="right_col" role="main">
                            <div class="content-sec">
                                <div class="col-md-12">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        @if(session('success'))
                                            <span class="alert alert-success"> {{session('success')}}</span>
                                        @endif
                                        @if($errors->any())
                                            <ul  class="alert alert-danger">
                                                @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <div class="x_panel">
                                            <a class="btn btn-danger btn-xs">Your Software Was Expired ! </a>
                                            <p style="color:#3c763d;">Please Contact us for Renew<br>
                                                <a href="http://geniusservicenepal.com/" style="color:Blue;">Genius Service Nepal Pvt. Ltd.</a>
                                            <br>
                                                Putalisadak, Kathmandu, Nepal<br>
                                            Phone : 01-4011099, 9856065444<br>
                                            Email : geniusservicenepal@gmail.com || youramesh5@gmail.com
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                <div class="main_container">
                    <div class="right_col" role="main">
                        <div class="content-sec">
                            <div class="col-md-12">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        @if(session('success'))
                                            <span class="alert alert-success"> {{session('success')}}</span>
                                        @endif
                                        @if($errors->any())
                                            <ul  class="alert alert-danger">
                                                @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <i style="float: right;"><a href="{{route('roomView')}}" style="margin:0; padding:2px; background-color: grey; color:#fff;" class="btn btn-xs" >View All</a></i>
                                                <i style="float: right; margin:0 5px;"><a href="" style="margin:0; padding:2px; background-color: grey; color:#fff;" class="btn btn-xs"  data-toggle="modal" data-target="#room_modal">Add Rooms</a></i>
                                                <i style="float: right; margin:0 5px;"><a href="" style="margin:0; padding:2px; background-color: grey; color:#fff;" class="btn btn-xs"  data-toggle="modal" data-target="#floor_modal">Add Room Floor</a></i>
                                                <i style="float: right;"><a href="" style="margin:0; padding:2px; background-color: grey; color:#fff;" class="btn btn-xs"  data-toggle="modal" data-target="#roomType_modal">Add Room Type</a></i>

                                                <h2>Room Status</h2>
                                                <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>

                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="#">Settings 1</a>
                                                            </li>
                                                            <li><a href="#">Settings 2</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                    </li>
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content" style="padding:0; margin:0;">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h5 style="text-align: center; color:Green; font-weight: bolder;">Today Room Status
                                                        <span style="color:#1ea094;">
                                                    <script type="text/javascript">
                                                        var tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

                                                        function GetClock(){
                                                            var d=new Date();
                                                            var nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();

                                                            var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

                                                            if(nhour==0){ap=" AM";nhour=12;}
                                                            else if(nhour<12){ap=" AM";}
                                                            else if(nhour==12){ap=" PM";}
                                                            else if(nhour>12){ap=" PM";nhour-=12;}

                                                            if(nmin<=9) nmin="0"+nmin;
                                                            if(nsec<=9) nsec="0"+nsec;

                                                            document.getElementById('clockbox').innerHTML=""+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
                                                        }

                                                        window.onload=function(){
                                                            GetClock();
                                                            setInterval(GetClock,1000);
                                                        }
                                                    </script>
                                                    <div id="clockbox"></div>
                                                    </span>
                                                    </h5>
                                                    <table class="table-condensed table-bordered table-hover" style="width: 100%; text-align: center;">
                                                        <tr>
                                                            <th style="text-align: center; background-color: #96223c; color:#fff; padding:5px;">Floor</th>
                                                            <th style="text-align: center; background-color: #96223c; color:#fff; padding:5px;" colspan="10">Room</th>
                                                        </tr>

                                                        @foreach($FloorData as $floor)
                                                        <tr>
                                                            <td style="background-color: #96223c; color:#fff; padding:0; margin:0;">{{$floor->name}}</td>
                                                            @foreach($RoomData as $room)
                                                            @foreach($RoomTYpeData as $roomType)
                                                                @if($floor->id == $room->floor_id && $room->room_type_id == $roomType->id)
                                                                    @if($room->room_status == 'CheckedOut')
                                                                    <td style="margin:0; padding:0; ">
                                                                        <div class="col-sm-12 col-xs-12">
                                                                            <a href="{{url('admin/'.$room->id.'/RoomStatus')}}" class="btn btn-xs" style="background-color: Green; font-size: 18px; color:#fff;">{{$room->room_no}}</a>
                                                                        </div>
                                                                        <div class="col-sm-12 col-xs-12">
                                                                            <i style="background-color: grey; color:#fff; padding:5px;" class="btn btn-xs">{{$roomType->name}}</i>
                                                                        </div>
                                                                    </td>
                                                                    @elseif($room->room_status == 'CheckedIn')
                                                                    <td style="margin:0; padding:0;">
                                                                        <div class="col-sm-12 col-xs-12">
                                                                        <a href="{{url('admin/'.$room->id.'/RoomStatus')}}" class="btn btn-xs" style="background-color: Red; color:#fff; font-size: 18px; ">{{$room->room_no}}</a>
                                                                        </div>
                                                                        <div class="col-sm-12 col-xs-12">
                                                                        <i style="background-color: grey; color:#fff; padding:5px;" class="btn btn-xs">{{$roomType->name}}</i>
                                                                        </div>
                                                                        <div class="col-sm-12 col-xs-12">
                                                                        @foreach($customer as $customerData)
                                                                        @if($room->customer_id == $customerData->id)
                                                                                <a href="{{route('roomCheck')}}" style="color:#fff; background-color: Red;" class="btn btn-xs">Sold : {{$customerData->name}}</a>
                                                                            @endif
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="col-sm-12 col-xs-12">
                                                                        @foreach($customer as $customerData)
                                                                        @if($room->customer_id == $customerData->id && !($room->date == date('Y-m-d')))
                                                                                <a style="color:#fff; background-color: Red;">Still CheckedIn From : {{$room->date}}</a>
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </td>
                                                                            @else
                                                                    <td style="margin:0; padding:0;">
                                                                        <div class="col-sm-12 col-xs-12">
                                                                        <a href="{{url('admin/'.$room->id.'/RoomStatus')}}" class="btn btn-xs" style="background-color: Orange; color:#fff; font-size:18px;">{{$room->room_no}}</a>
                                                                        </div>
                                                                        <div class="col-sm-12 col-xs-12">
                                                                            <i style="background-color: grey; color:#fff; padding:5px;" class="btn btn-xs">{{$roomType->name}}</i>
                                                                        </div>
                                                                        <div class="col-sm-12 col-xs-12">
                                                                        @foreach($booked as $bookData)
                                                                            @if($room->id == $bookData->room_id)
                                                                                <a href="{{route('roomBook')}}" style="color:#fff; background-color: Orange;" class="btn btn-xs">Booked : {{$bookData->customer_name}}</a>
                                                                            @endif
                                                                        @endforeach

                                                                    </td>
                                                                    @endif
                                                                @endif
                                                                @endforeach
                                                                @endforeach
                                                        </tr>
                                                        @endforeach
                                                        <tr style="width: 100%; text-align: center; background:#96223c; margin-top:5px; color:#fff;">
                                                            <td colspan="11">Choose Avialable Room From Table ! (Click Room No. for Checked in & Booking)</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <hr>
                                                    <table class="table-condensed table-bordered table-hover" style="width: 100%;">
                                                        <tr>
                                                            <th style="width:25px; height: 25px; background-color: Orange;"></th>
                                                            <th style="color:#fff; background-color: Orange;">Booked (Pending)</th>
                                                            <th></th>
                                                            <th style="width:25px; height: 25px; background-color: Red;"></th>
                                                            <th style="color:#fff; background-color: Red;">Checked In (Sold)</th>
                                                            <th></th>
                                                            <th style="width:25px; height: 25px; background-color: Green;"></th>
                                                            <th style="color:#fff; background-color: Green;">Checked Out (Avialable)</th>
                                                        </tr>
                                                        {{--<tr>--}}
                                                            {{--<th style="width:25px; height: 25px; background-color: Red;"></th>--}}
                                                            {{--<th style="color:Red;">Checked In (Sold)</th>--}}
                                                        {{--</tr>--}}
                                                        {{--<tr>--}}
                                                            {{--<th style="width:25px; height: 25px; background-color: Green;"></th>--}}
                                                            {{--<th style="color:Green;">Checked Out</th>--}}
                                                        {{--</tr>--}}
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Customer Status</h2>
                                                <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>

                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="#">Settings 1</a>
                                                            </li>
                                                            <li><a href="#">Settings 2</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                    </li>
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h5 style="text-align: center; color:Green; font-weight: bolder;">Today Guest Status (Checked In)
                                                    </h5>
                                                    <table class="table-condensed table-bordered table-hover" style="width: 100%; text-align: center;">
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Regd No.</th>
                                                            <th>Room</th>
                                                            <th>Guest Name</th>
                                                            <th>Address</th>
                                                            <th>Phone</th>
                                                            <th>Male</th>
                                                            <th>Female</th>
                                                            <th>Relation</th>
                                                            <th>Entry by</th>
                                                            <th>Billing</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        @foreach($RoomData as $key=>$roomStsCheck)
                                                            @foreach($roomCheck as $key=>$roomSts)
                                                            @if(($roomSts->date === date('Y-m-d')) && $roomStsCheck->date === date('Y-m-d') && $roomStsCheck->id == $roomSts->room_id && $roomStsCheck->room_status == 'CheckedIn' && $roomStsCheck->customer_id == $roomSts->customer_id)
                                                        <tr>
                                                            <td>{{$roomSts->date}}</td>
                                                            <td>
                                                                        {{$roomSts->customer_id}}
                                                            </td>
                                                            <td>
                                                                @foreach($RoomData as $room)
                                                                    @if($room->id == $roomSts->room_id)
                                                                        <a href="" style="background-color: Red; color:#fff; padding:5px;">{{$room->room_no}}</a>
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($customer as $customerValue)
                                                                    @if($customerValue->id == $roomSts->customer_id)
                                                                        {{$customerValue->name}}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($customer as $customerValue)
                                                                @foreach($district as $districtValue)
                                                                    @if($customerValue->district_id == $districtValue->id && $customerValue->id == $roomSts->customer_id)
                                                                        {{$districtValue->name}}
                                                                    @endif
                                                                @endforeach
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($customer as $customerValue)
                                                                    @if($customerValue->id == $roomSts->customer_id)
                                                                        {{$customerValue->contact_1}}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>{{$roomSts->male}}</td>
                                                            <td>{{$roomSts->female }}</td>
                                                            <td>{{$roomSts->relation }}</td>
                                                            <td>
                                                                @foreach($userData as $user)
                                                                    @if($user->id == $roomSts->user_id)
                                                                        {{$user->name}} ({{$user->user_type}})
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                <a href="{{url('roomCheck/'.$roomSts->id.'/editBill')}}" class="btn btn-info btn-xs">View</a>
                                                            </td>
                                                            <td>
                                                                <form action="{{url('admin/'.$roomSts->room_id.'/updateRoomSts')}}" method="post">
                                                                    {{csrf_field()}}
                                                                    <input type="hidden" name="room_status" value="CheckedOut">
                                                                    <input type="hidden" name="date" value="">
                                                                    <input type="hidden" name="customer_id" value="">
                                                                    <button type="submit" class="btn btn-success btn-xs">Checked Out</button>
                                                                </form>
                                                                @if($roomSts->date == date('Y-m-d'))
                                                                    @else
                                                                <form action="{{url('admin/'.$roomSts->room_id.'/updateRoomCheck')}}" method="post">
                                                                    {{csrf_field()}}
                                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                    <input type="hidden" name="date" value="<?php echo date('Y-m-d') ?>">
                                                                    <input type="hidden" name="room_status" value="CheckedIn">
                                                                    <input type="hidden" name="room_id" value="{{$roomSts->room_id}}">

                                                                    <input type="hidden" name="customer_id" value="{{$roomSts->customer_id}}">
                                                                    <input type="hidden" name="time">
                                                                    <input type="hidden" name="male" value="{{$roomSts->male}}">
                                                                    <input type="hidden" name="female" value="{{$roomSts->female}}">
                                                                    <input type="hidden" name="relation" value="{{$roomSts->relation}}">
                                                                    <input type="hidden" name="purpose" value="{{$roomSts->purpose}}">
                                                                    <input type="hidden" name="remarks" value="{{$roomSts->remarks}}">

                                                                    <button type="submit" class="btn btn-warning btn-xs">Continue</button>
                                                                    @endif
                                                                </form>
                                                            </td>
                                                        </tr>
                                                            @endif
                                                            @endforeach
                                                            @endforeach
                                                    </table>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h5 style="text-align: center; color:Green; font-weight: bolder;">Today Guest Status (Booked)
                                                    </h5>
                                                    <table class="table-condensed table-bordered table-hover" style="width: 100%; text-align: center;">
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Name</th>
                                                            <th>Contact</th>
                                                            <th>Male</th>
                                                            <th>Female</th>
                                                            <th>Relation</th>
                                                            <th>Arrival time</th>
                                                            <th>Booked Room</th>
                                                            <th>Enter by</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        @foreach($RoomData as $key=>$roomStsCheck)
                                                            @foreach($booked as $key=>$roomSts)
                                                                @if(($roomSts->date === date('Y-m-d')) && $roomStsCheck->date === date('Y-m-d') && $roomStsCheck->id == $roomSts->room_id && $roomStsCheck->room_status == 'Booked')
                                                                    <tr>
                                                                        <td>{{$roomSts->date}}</td>
                                                                        <td>{{$roomSts->customer_name}}</td>
                                                                        <td>{{$roomSts->phone}}</td>
                                                                        <td>{{$roomSts->male}}</td>
                                                                        <td>{{$roomSts->female}}</td>
                                                                        <td>{{$roomSts->relation}}</td>
                                                                        <td>{{$roomSts->time}}</td>
                                                                        <td>

                                                                                @if($roomStsCheck->id == $roomSts->room_id && $roomStsCheck->room_status == 'Booked')
                                                                                    <a style="background-color: Orange; color:#fff; padding:5px;">{{$roomStsCheck->room_no}} <i>(Still Booked)</i></a>
                                                                                @endif
                                                                                @if($roomStsCheck->id == $roomSts->room_id && $roomStsCheck->room_status == 'CheckedIn')
                                                                                    <a style="background-color: Red; color:#fff; padding:5px;">{{$roomStsCheck->room_no}} <i>(Checked In)</i></a>
                                                                                @endif
                                                                                @if($roomStsCheck->id == $roomSts->room_id && $roomStsCheck->room_status == 'CheckedOut')
                                                                                    <a style="background-color: Green; color:#fff; padding:5px;">{{$roomStsCheck->room_no}} <i>(Room Left)</i></a>
                                                                                @endif
                                                                        </td>
                                                                        <td>
                                                                            @foreach($userData as $user)
                                                                                @if($user->id == $roomSts->user_id)
                                                                                    {{$user->name}} ({{$user->user_type}})
                                                                                @endif
                                                                            @endforeach
                                                                        </td>

                                                                        <td>
                                                                                @if($roomStsCheck->id == $roomSts->room_id && $roomStsCheck->room_status == 'Booked')
                                                                                    <form action="{{url('roomBook/delete/'.$roomSts->room_id)}}" method="post">
                                                                                        {{csrf_field()}}
                                                                                        <input type="hidden" name="room_status" value="CheckedOut">
                                                                                        <input type="hidden" name="date" value="">
                                                                                        <button type="submit" onclick="return confirm('Are you sure you want to Unbook this room?');" class="btn btn-danger btn-xs">UnBook</button>
                                                                                    </form>
                                                                                @elseif($roomStsCheck->id == $roomSts->room_id && $roomStsCheck->room_status == 'CheckedOut')
                                                                                    <form action="{{url('roomBook/delete/'.$room->room_id)}}" method="post">
                                                                                        {{csrf_field()}}
                                                                                        <input type="hidden" name="room_status" value="Booked">
                                                                                        <input type="hidden" name="date" value="">
                                                                                        <button type="submit" onclick="return confirm('Are you sure you want to Book this room?');" class="btn btn-success btn-xs">Book</button>
                                                                                    </form>
                                                                                    <a href="{{url('roomBook/deleteItm/'.$room->id)}}" class="btn btn-danger btn-xs">Delete</a>
                                                                                @endif
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div  style="margin-top:25px;" class="modal fade" id="room_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="center title_red" id="myModalLabel">Add Room</h4>
                            </div>
                            @if(session('success'))
                                <span class="alert alert-success"> {{session('success')}}</span>
                            @endif
                            @if($errors->any())
                                <ul  class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="modal-body center">
                                <form action="{{route('addRoom')}}" method="post">
                                    {{csrf_field()}}
                                    <select class="form-control" id="floor_id" name="floor_id">
                                        <option value="">Select Floor</option>
                                        @foreach($FloorData as $floor)
                                        <option value="{{$floor->id}}">{{$floor->name}}</option>
                                            @endforeach
                                    </select>
                                        <input type="number" class="form-control" name="room_no" placeholder="Enter Room No.">
                                    <select class="form-control" id="room_type_id" name="room_type_id">
                                        <option value="">Select Room Type</option>
                                        @foreach($RoomTYpeData as $roomType)
                                            <option value="{{$roomType->id}}">{{$roomType->name}}</option>
                                            @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-default" style="background-color: #757575; color:#fff;">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div  style="margin-top:25px;" class="modal fade" id="floor_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="center title_red" id="myModalLabel">Add Room Floor</h4>
                            </div>
                            <div class="modal-body center">
                                <form action="{{route('addRoomFloor')}}" method="post">
                                    {{csrf_field()}}
                                        <input type="text" class="form-control" name="name" placeholder="Create Floor Name">
                                    <select class="form-control">
                                        <option value="">Check Floor Exist or Not</option>
                                        @foreach($FloorData as $roomType)
                                            <option value="{{$roomType->id}}">{{$roomType->name}}</option>
                                            @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-default" style="background-color: #757575; color:#fff;">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div  style="margin-top:25px;" class="modal fade" id="roomType_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="center title_red" id="myModalLabel">Add Room Type</h4>
                            </div>
                            @if(session('success'))
                                <span class="alert alert-success"> {{session('success')}}</span>
                            @endif
                            @if($errors->any())
                                <ul  class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="modal-body center">
                                <form action="{{route('addRoomType')}}" method="post">
                                    {{csrf_field()}}
                                        <input type="text" class="form-control" name="name" placeholder="Create Room Type">
                                    <select class="form-control">
                                        <option value="">Check Exist Room Type or Not</option>
                                        @foreach($RoomTYpeData as $roomType)
                                            <option>{{$roomType->name}}</option>
                                            @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-default" style="background-color: #757575; color:#fff;">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
     @elseif(Auth::user()->user_status =='2')
        <div class="main_container">
            <div class="right_col" role="main">
                <div class="content-sec">
                    <div class="col-md-12">
                        @if(session('success'))
                            <span class="alert alert-success"> {{session('success')}}</span>
                        @endif
                        @if($errors->any())
                            <ul  class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <i style="float: right;"><a href="{{route('roomView')}}" style="margin:0; padding:2px; background-color: grey; color:#fff;" class="btn btn-xs" >View All</a></i>
                                    <i style="float: right; margin:0 5px;"><a href="" style="margin:0; padding:2px; background-color: grey; color:#fff;" class="btn btn-xs"  data-toggle="modal" data-target="#room_modal">Add Rooms</a></i>
                                    <i style="float: right; margin:0 5px;"><a href="" style="margin:0; padding:2px;  background-color: grey; color:#fff;" class="btn btn-xs"  data-toggle="modal" data-target="#floor_modal">Add Room Floor</a></i>
                                    <i style="float: right;"><a href="" style="margin:0; padding:2px; background-color: grey; color:#fff;" class="btn btn-xs"  data-toggle="modal" data-target="#roomType_modal">Add Room Type</a></i>

                                    <h2>Room Status</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>

                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5 style="text-align: center; color:Green; font-weight: bolder;">Today Room Status
                                            <span style="color:#1ea094;">
                                                    <script type="text/javascript">
                                                        var tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

                                                        function GetClock(){
                                                            var d=new Date();
                                                            var nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();

                                                            var nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds(),ap;

                                                            if(nhour==0){ap=" AM";nhour=12;}
                                                            else if(nhour<12){ap=" AM";}
                                                            else if(nhour==12){ap=" PM";}
                                                            else if(nhour>12){ap=" PM";nhour-=12;}

                                                            if(nmin<=9) nmin="0"+nmin;
                                                            if(nsec<=9) nsec="0"+nsec;

                                                            document.getElementById('clockbox').innerHTML=""+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
                                                        }

                                                        window.onload=function(){
                                                            GetClock();
                                                            setInterval(GetClock,1000);
                                                        }
                                                    </script>
                                                    <div id="clockbox"></div>
                                                    </span>
                                        </h5>
                                        <table class="table-condensed table-bordered table-hover" style="width: 100%; text-align: center;">
                                            <tr>
                                                <th style="text-align: center; background-color: grey; color:#fff; padding:5px;">Floor</th>
                                                <th style="text-align: center; background-color: grey; color:#fff; padding:5px;" colspan="10">Room</th>
                                            </tr>

                                            @foreach($FloorData as $floor)
                                                <tr>
                                                    <td style="background-color: #7b4b71; color:#fff; padding:5px;">{{$floor->name}}</td>
                                                    @foreach($RoomData as $room)
                                                        @foreach($RoomTYpeData as $roomType)
                                                            @if($floor->id == $room->floor_id && $room->room_type_id == $roomType->id)
                                                                @if($room->room_status == 'CheckedOut')
                                                                    <td>
                                                                        <div class="col-sm-12 col-xs-12">
                                                                            <a href="{{url('admin/'.$room->id.'/RoomStatus')}}" style="background-color: Green; color:#fff; padding:5px;">{{$room->room_no}}</a>
                                                                        </div>
                                                                        <div class="col-sm-12 col-xs-12">
                                                                            <i style="background-color: grey; color:#fff; padding:5px; font-size: 10px;">{{$roomType->name}}</i>
                                                                        </div>
                                                                    </td>
                                                                @elseif($room->room_status == 'CheckedIn')
                                                                    <td>
                                                                        <div class="col-sm-12 col-xs-12">
                                                                            <a href="" style="background-color: Red; color:#fff; padding:5px;">{{$room->room_no}}</a>
                                                                        </div>
                                                                        <div class="col-sm-12 col-xs-12">
                                                                            <i style="background-color: grey; color:#fff; font-size: 10px; padding:5px;">{{$roomType->name}}</i>
                                                                        </div>
                                                                        <div class="col-sm-12 col-xs-12">
                                                                            @foreach($customer as $customerData)
                                                                                @if($room->customer_id == $customerData->id)
                                                                                    <a href="{{route('roomCheck')}}" style="color:#fff; background-color: Red;  font-size: 10px;" class="btn btn-xs">Sold : {{$customerData->name}}</a>
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </td>
                                                                @else
                                                                    <td>
                                                                        <div class="col-sm-12 col-xs-12">
                                                                            <a href="{{url('admin/'.$room->id.'/RoomStatus')}}" style="background-color: Orange; color:#fff; padding:5px;">{{$room->room_no}}</a>
                                                                        </div>
                                                                        <div class="col-sm-12 col-xs-12">
                                                                            <i style="background-color: grey; color:#fff; padding:5px; font-size: 10px;">{{$roomType->name}}</i>
                                                                        </div>
                                                                        <div class="col-sm-12 col-xs-12">
                                                                            @foreach($booked as $bookData)
                                                                                @if($room->id == $bookData->room_id)
                                                                                    <a href="{{route('roomBook')}}" style="color:#fff; font-size: 10px;" class="btn btn-warning btn-xs">Booked : {{$bookData->customer_name}}</a>
                                                                        @endif
                                                                        @endforeach

                                                                    </td>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <hr>
                                        <table class="table-condensed table-bordered table-hover" style="width: 100%; text-align: center;">
                                            <tr>
                                                <th style="width:25px; height: 25px; background-color: Orange;"></th>
                                                <th style="color:Orange;">Booked (Pending)</th>
                                                <th style="width:25px; height: 25px; background-color: Red;"></th>
                                                <th style="color:Red;">Checked In (Sold)</th>
                                                <th style="width:25px; height: 25px; background-color: Green;"></th>
                                                <th style="color:Green;">Checked Out (Avialable)</th>
                                            </tr>
                                            {{--<tr>--}}
                                            {{--<th style="width:25px; height: 25px; background-color: Red;"></th>--}}
                                            {{--<th style="color:Red;">Checked In (Sold)</th>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                            {{--<th style="width:25px; height: 25px; background-color: Green;"></th>--}}
                                            {{--<th style="color:Green;">Checked Out</th>--}}
                                            {{--</tr>--}}
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Customer Status</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>

                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5 style="text-align: center; color:Green; font-weight: bolder;">Today Guest Status (Checked In)
                                        </h5>
                                        <table class="table-condensed table-bordered table-hover" style="width: 100%; text-align: center;">
                                            <tr>
                                                <th>Date</th>
                                                <th>Regd No.</th>
                                                <th>Room</th>
                                                <th>Guest Name</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Male</th>
                                                <th>Female</th>
                                                <th>Relation</th>
                                                <th>Entry by</th>
                                                <th>Billing</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach($RoomData as $key=>$roomStsCheck)
                                                @foreach($roomCheck as $key=>$roomSts)
                                                    @if(($roomSts->date === date('Y-m-d')) && $roomStsCheck->date === date('Y-m-d') && $roomStsCheck->id == $roomSts->room_id && $roomStsCheck->room_status == 'CheckedIn' && $roomStsCheck->customer_id == $roomSts->customer_id)
                                                        <tr>
                                                            <td>{{$roomSts->date}}</td>
                                                            <td>
                                                                {{$roomSts->customer_id}}
                                                            </td>
                                                            <td>
                                                                @foreach($RoomData as $room)
                                                                    @if($room->id == $roomSts->room_id)
                                                                        <a href="" style="background-color: Red; color:#fff; padding:5px;">{{$room->room_no}}</a>
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($customer as $customerValue)
                                                                    @if($customerValue->id == $roomSts->customer_id)
                                                                        {{$customerValue->name}}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($customer as $customerValue)
                                                                    @foreach($district as $districtValue)
                                                                        @if($customerValue->district_id == $districtValue->id && $customerValue->id == $roomSts->customer_id)
                                                                            {{$districtValue->name}}
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($customer as $customerValue)
                                                                    @if($customerValue->id == $roomSts->customer_id)
                                                                        {{$customerValue->contact_1}}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>{{$roomSts->male}}</td>
                                                            <td>{{$roomSts->female }}</td>
                                                            <td>{{$roomSts->relation }}</td>
                                                            <td>
                                                                @foreach($userData as $user)
                                                                    @if($user->id == $roomSts->user_id)
                                                                        {{$user->name}} ({{$user->user_type}})
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                <a href="{{url('roomCheck/'.$roomSts->id.'/editBill')}}" class="btn btn-info btn-xs">View</a>
                                                            </td>
                                                            <td>
                                                                <form action="{{url('admin/'.$roomSts->room_id.'/updateRoomSts')}}" method="post">
                                                                    {{csrf_field()}}
                                                                    <input type="hidden" name="room_status" value="CheckedOut">
                                                                    <input type="hidden" name="date" value="">
                                                                    <input type="hidden" name="customer_id" value="">
                                                                    <button type="submit" class="btn btn-success btn-xs">Checked Out</button>
                                                                </form>
                                                                @if($roomSts->date == date('Y-m-d'))
                                                                @else
                                                                    <form action="{{url('admin/'.$roomSts->room_id.'/updateRoomCheck')}}" method="post">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                        <input type="hidden" name="date" value="<?php echo date('Y-m-d') ?>">
                                                                        <input type="hidden" name="room_status" value="CheckedIn">
                                                                        <input type="hidden" name="room_id" value="{{$roomSts->room_id}}">

                                                                        <input type="hidden" name="customer_id" value="{{$roomSts->customer_id}}">
                                                                        <input type="hidden" name="time">
                                                                        <input type="hidden" name="male" value="{{$roomSts->male}}">
                                                                        <input type="hidden" name="female" value="{{$roomSts->female}}">
                                                                        <input type="hidden" name="relation" value="{{$roomSts->relation}}">
                                                                        <input type="hidden" name="purpose" value="{{$roomSts->purpose}}">
                                                                        <input type="hidden" name="remarks" value="{{$roomSts->remarks}}">

                                                                        <button type="submit" class="btn btn-warning btn-xs">Continue</button>
                                                                        @endif
                                                                    </form>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </table>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <h5 style="text-align: center; color:Green; font-weight: bolder;">Today Guest Status (Booked)
                                        </h5>
                                        <table class="table-condensed table-bordered table-hover" style="width: 100%; text-align: center;">
                                            <tr>
                                                <th>Date</th>
                                                <th>Regd No.</th>
                                                <th>Room</th>
                                                <th>Guest Name</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Male</th>
                                                <th>Female</th>
                                                <th>Relation</th>
                                                <th>Entry by</th>
                                                <th>Billing</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach($RoomData as $key=>$roomStsCheck)
                                                @foreach($roomCheck as $key=>$roomSts)
                                                    @if(($roomSts->date === date('Y-m-d')) && $roomStsCheck->date === date('Y-m-d') && $roomStsCheck->id == $roomSts->room_id && $roomStsCheck->room_status == 'CheckedIn' && $roomStsCheck->customer_id == $roomSts->customer_id)
                                                        <tr>
                                                            <td>{{$roomSts->date}}</td>
                                                            <td>
                                                                {{$roomSts->customer_id}}
                                                            </td>
                                                            <td>
                                                                @foreach($RoomData as $room)
                                                                    @if($room->id == $roomSts->room_id)
                                                                        <a href="" style="background-color: Red; color:#fff; padding:5px;">{{$room->room_no}}</a>
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($customer as $customerValue)
                                                                    @if($customerValue->id == $roomSts->customer_id)
                                                                        {{$customerValue->name}}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($customer as $customerValue)
                                                                    @foreach($district as $districtValue)
                                                                        @if($customerValue->district_id == $districtValue->id && $customerValue->id == $roomSts->customer_id)
                                                                            {{$districtValue->name}}
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($customer as $customerValue)
                                                                    @if($customerValue->id == $roomSts->customer_id)
                                                                        {{$customerValue->contact_1}}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>{{$roomSts->male}}</td>
                                                            <td>{{$roomSts->female }}</td>
                                                            <td>{{$roomSts->relation }}</td>
                                                            <td>
                                                                @foreach($userData as $user)
                                                                    @if($user->id == $roomSts->user_id)
                                                                        {{$user->name}} ({{$user->user_type}})
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                <a href="{{url('roomCheck/'.$roomSts->id.'/editBill')}}" class="btn btn-info btn-xs">View</a>
                                                            </td>
                                                            <td>
                                                                <form action="{{url('admin/'.$roomSts->room_id.'/updateRoomSts')}}" method="post">
                                                                    {{csrf_field()}}
                                                                    <input type="hidden" name="room_status" value="CheckedOut">
                                                                    <input type="hidden" name="date" value="">
                                                                    <input type="hidden" name="customer_id" value="">
                                                                    <button type="submit" class="btn btn-success btn-xs">Checked Out</button>
                                                                </form>
                                                                @if($roomSts->date == date('Y-m-d'))
                                                                @else
                                                                    <form action="{{url('admin/'.$roomSts->room_id.'/updateRoomCheck')}}" method="post">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                        <input type="hidden" name="date" value="<?php echo date('Y-m-d') ?>">
                                                                        <input type="hidden" name="room_status" value="CheckedIn">
                                                                        <input type="hidden" name="room_id" value="{{$roomSts->room_id}}">

                                                                        <input type="hidden" name="customer_id" value="{{$roomSts->customer_id}}">
                                                                        <input type="hidden" name="time">
                                                                        <input type="hidden" name="male" value="{{$roomSts->male}}">
                                                                        <input type="hidden" name="female" value="{{$roomSts->female}}">
                                                                        <input type="hidden" name="relation" value="{{$roomSts->relation}}">
                                                                        <input type="hidden" name="purpose" value="{{$roomSts->purpose}}">
                                                                        <input type="hidden" name="remarks" value="{{$roomSts->remarks}}">

                                                                        <button type="submit" class="btn btn-warning btn-xs">Continue</button>
                                                                        @endif
                                                                    </form>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div  style="margin-top:25px;" class="modal fade" id="room_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="center title_red" id="myModalLabel">Add Room</h4>
                    </div>
                    @if(session('success'))
                        <span class="alert alert-success"> {{session('success')}}</span>
                    @endif
                    @if($errors->any())
                        <ul  class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="modal-body center">
                        <form action="{{route('addRoom')}}" method="post">
                            {{csrf_field()}}
                            <select class="form-control" id="floor_id" name="floor_id">
                                <option value="">Select Floor</option>
                                @foreach($FloorData as $floor)
                                    <option value="{{$floor->id}}">{{$floor->name}}</option>
                                @endforeach
                            </select>
                            <input type="number" class="form-control" name="room_no" placeholder="Enter Room No.">
                            <select class="form-control" id="room_type_id" name="room_type_id">
                                <option value="">Select Room Type</option>
                                @foreach($RoomTYpeData as $roomType)
                                    <option value="{{$roomType->id}}">{{$roomType->name}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-default" style="background-color: #757575; color:#fff;">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top:25px;" class="modal fade" id="floor_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="center title_red" id="myModalLabel">Add Room Floor</h4>
                    </div>
                    <div class="modal-body center">
                        <form action="{{route('addRoomFloor')}}" method="post">
                            {{csrf_field()}}
                            <input type="text" class="form-control" name="name" placeholder="Create Floor Name">
                            <select class="form-control">
                                <option value="">Check Floor Exist or Not</option>
                                @foreach($FloorData as $roomType)
                                    <option value="{{$roomType->id}}">{{$roomType->name}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-default" style="background-color: #757575; color:#fff;">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top:25px;" class="modal fade" id="roomType_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="center title_red" id="myModalLabel">Add Room Type</h4>
                    </div>
                    @if(session('success'))
                        <span class="alert alert-success"> {{session('success')}}</span>
                    @endif
                    @if($errors->any())
                        <ul  class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="modal-body center">
                        <form action="{{route('addRoomType')}}" method="post">
                            {{csrf_field()}}
                            <input type="text" class="form-control" name="name" placeholder="Create Room Type">
                            <select class="form-control">
                                <option value="">Check Exist Room Type or Not</option>
                                @foreach($RoomTYpeData as $roomType)
                                    <option>{{$roomType->name}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-default" style="background-color: #757575; color:#fff;">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
     @else
        <div class="main_container">
            <div class="right_col" role="main">
                <div class="content-sec">
                    <div class="col-md-12">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <a class="btn btn-danger btn-xs">Your Account Was Suspended ! Please Contact Hotel Sahara Inn, Macchapokhari</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection