@extends($masterPath.'.master.master')

@section('content')

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
                                <h2>Customer Status</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="" method="post">
                                    {{csrf_field()}}
                                    <div class="col-sm-2">
                                        <label for="">Date Duration : From</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="">To</label>
                                    </div>
                                    <div style="clear: both;"></div>
                                    <div class="col-sm-2">
                                            <input type="date" name="date1" class="form-control input-sm" value="{{request('date1')}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="date" name="date2" class="form-control input-sm" value="{{request('date2')}}">
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="">Guest</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="name" id="" class="form-control input-sm">
                                            <option value="">[Select Guest]</option>
                                            @foreach($customer as $Value)
                                                @if(request('name') == $Value->id)
                                                <option value="{{$Value->id}}" selected="selected">{{$Value->name}} ({{$Value->contact_1}})</option>
                                                @else
                                                    <option value="{{$Value->id}}">{{$Value->name}} ({{$Value->contact_1}})</option>
                                                    @endif
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="">Room No.</label>
                                    </div>
                                    <div class="col-sm-2">
                                        <select name="room_id" id="" class="form-control input-sm">
                                            <option value="">[Select Room]</option>
                                            @foreach($RoomData as $Value)
                                                @if(request('room_id') == $Value->id)
                                                <option value="{{$Value->id}}" selected="selected" >{{$Value->room_no}}</option>
                                                @else
                                                    <option value="{{$Value->id}}">{{$Value->room_no}}</option>
                                                    @endif
                                                    @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="">Year</label>
                                    </div>
                                    <div class="col-sm-1">
                                        <select name="year" class="form-control input-sm">
                                            @if(request('year'))
                                                <option value="{{request('year')}}" selected="selected" >{{request('year')}}</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                            @else
                                            <option value="{{date('Y')}}">{{date('Y')}}</option>

                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                                @endif
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-default" style="background-color: #757575; color:#fff; width: 100%;">Search</button>
                                    </div>
                                </form>
                            </div>
                            <div class="x_content">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="pagination-wrapper"> {!! $roomCheck->render() !!} </div>
                                    <table class="table-condensed table-bordered table-hover" style="width: 100%; text-align: center;">
                                        @foreach($customer as $Value)
                                            @if(request('name') == $Value->id)
                                                Mr./Mrs. <b>{{$Value->name}}</b> Record, Phone: {{$Value->contact_1}}<br>

                                            @endif
                                        @endforeach
                                        @foreach($RoomData as $Value)
                                            @if(request('room_id') == $Value->id)
                                                Room No. :{{$Value->room_no}}<br>
                                            @endif
                                        @endforeach
                                            @if(request('date1') && !request('date2'))
                                                Dated on : <b>{{request('date1')}}</b><br>
                                                @endif
                                            @if(request('date1') && request('date2'))
                                                From : <b>{{request('date1')}}</b> to <b>{{request('date2')}}</b><br>
                                                @endif
                                            Total : <i style="color:Green; font-weight: bolder;">{{count($roomCheck)}}</i> Record Found !
                                        <tr>
                                            <th>SN</th>
                                            <th>Date</th>
                                            <th>Guest Name</th>
                                            <th>Phone</th>
                                            <th>Customer ID</th>
                                            <th>Regd No.</th>
                                            <th>Room</th>
                                            <th>in time</th>
                                            <th>Male</th>
                                            <th>Female</th>
                                            <th>Relation</th>
                                            <th>Purpose</th>
                                            <th>Remarks</th>
                                            <th>Billing</th>
                                            <th>Entry by</th>
                                            <th>Action</th>
                                        </tr>
                                        @if(count($roomCheck)>0)
                                        @foreach($roomCheck as $key=>$roomSts)

                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$roomSts->date}}</td>
                                                    <td>
                                                        {{$roomSts->customer->name}}
                                                    </td>
                                                    <td>
                                                        {{$roomSts->customer->contact_1}}
                                                    </td>
                                                    <td>
                                                        {{$roomSts->customer->customer_id_no}}
                                                    </td>
                                                    <td>{{$roomSts->customer_id}}</td>
                                                    <td>
                                                        @foreach($RoomData as $room)
                                                            @if($room->id == $roomSts->room_id)
                                                                <a href="" style="color:#000; padding:5px;">{{$room->room_no}}</a>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{$roomSts->time}}</td>
                                                    <td>{{$roomSts->male}}</td>
                                                    <td>{{$roomSts->female}}</td>
                                                    <td>{{$roomSts->relation}}</td>
                                                    <td>{{$roomSts->purpose}}</td>
                                                    <td></td>
                                                    <td>
                                                        <a href="{{url('roomCheck/'.$roomSts->id.'/editBill')}}" class="btn btn-info btn-xs">View</a>
                                                    </td>
                                                    <td>
                                                        @foreach($userData as $user)
                                                            @if($user->id == $roomSts->user_id)
                                                                {{$user->name}} ({{$user->user_type}})
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($RoomData as $room)
                                                            @if($room->id == $roomSts->room_id && $room->room_status == 'CheckedIn' && $room->date == $roomSts->date && $room->customer_id == $roomSts->customer_id)
                                                                    <form action="{{url('admin/'.$roomSts->room_id.'/updateRoomSts')}}" method="post">
                                                                    {{csrf_field()}}
                                                                    <input type="hidden" name="room_status" value="CheckedOut">
                                                                    <input type="hidden" name="date" value="">
                                                                    <input type="hidden" name="customer_id" value="">
                                                                    <button type="submit" class="btn btn-success btn-xs">Checked Out</button>
                                                                </form>
                                                            @elseif($room->room_status == 'CheckedOut' && $roomSts->date == date('Y-m-d') && $room->id == $roomSts->room_id)
                                                                <a href="{{url('roomCheck/delete/'.$roomSts->id)}}" onclick="return confirm('Are you sure you want to delete this Record?');"class="btn btn-danger btn-xs">Delete Info</a>
                                                            @endif
                                                        @endforeach
                                                            @if($roomSts->date == date('Y-m-d'))
                                                            @else
                                                        <form action="{{url('admin/'.$roomSts->room_id.'/updateRoomCheck')}}" method="post">
                                                            {{csrf_field()}}
                                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                            <input type="hidden" name="date" value="<?php echo date('Y-m-d') ?>">
                                                            <input type="hidden" name="room_status" value="CheckedIn">
                                                            <input type="hidden" name="room_id" value="{{$roomSts->room_id}}">

                                                            <input type="hidden" name="customer_id" value="{{$roomSts->customer_id}}">
                                                            <input type="hidden" name="male" value="{{$roomSts->male}}">
                                                            <input type="hidden" name="female" value="{{$roomSts->female}}">
                                                            <input type="hidden" name="relation" value="{{$roomSts->relation}}">
                                                            <input type="hidden" name="purpose" value="{{$roomSts->purpose}}">
                                                            <input type="hidden" name="remarks" value="{{$roomSts->remarks}}">

                                                            <button type="submit" class="btn btn-warning btn-xs">Continue (if same room use)</button><br>
                                                            <a href="{{route('login')}}" style="color:Blue;">Otherwise Please Check in from dashboard</a>
                                                        </form>
                                                                @endif
                                                    </td>
                                                </tr>

                                        @endforeach
                                            @else
                                        <tr>
                                            <td colspan="16"><a class="btn btn-danger btn-xs">Record Not Found</a></td>
                                        </tr>
                                            @endif
                                    </table>
                                    <div class="pagination-wrapper"> {!! $roomCheck->render() !!} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection