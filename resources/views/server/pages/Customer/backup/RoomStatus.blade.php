@extends($masterPath.'.master.master')

@section('content')

    <div class="main_container">
        <div class="right_col" role="main">
            <div class="content-sec">
                <div class="col-md-12">
                    @if($roomDefaultData->room_status == 'CheckedIn')
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel" style="border:1px solid #96223c;">
                                <div class="x_content" style="text-align: center;">
                                    @foreach($CustomeData as $customer)
                                        @if($customer->id == $roomDefaultData->customer_id)
                                            <a href="{{url('public/images/Customer/'.$customer->photo)}}" target="_blank"><img src="{{url('public/images/Customer/'.$customer->photo)}}" alt="image not found" width="100"></a>
                                    <h2>Room Checked in By : {{$customer->name}} ({{$customer->contact_1}})</h2>
                                            <form action="{{url('admin/'.$roomDefaultData->id.'/updateRoomSts')}}" method="post">
                                                {{csrf_field()}}
                                                <input type="hidden" name="room_status" value="CheckedOut">
                                                <input type="hidden" name="date" value="">
                                                <input type="hidden" name="customer_id" value="">
                                                <button type="submit" class="btn btn-success btn-xs">Checked Out</button>
                                            </form>
                                        @endif
                                        @endforeach
                                </div>
                            </div>
                        </div>
                        @else
                        @foreach($roomBook as $book)
                        @if($roomDefaultData->room_status == 'Booked' && $book->room_id == $roomDefaultData->id)
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel" style="border:1px solid #96223c;">
                                        <div class="x_title">
                            Room Booked By : {{$book->customer_name}} ({{$book->phone}})
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel" style="border:1px solid #96223c;">
                            <div class="x_title">
                                <h2>Room CheckedIn Form</h2>
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
                            <div class="x_content" style="text-align: center;">
                                <form action="{{url('admin/'.$roomDefaultData->id.'/updateRoomCheck')}}" data-parsley-validate method="post"
                                      enctype="multipart/form-data" class="form-horizontal form-label-left">
                                    {{csrf_field()}}
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="customer_name">Select Guest</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <select name="customer_id" id="customer_id" class="form-control input-sm" required="required">
                                            <option value="">[Select Guest]</option>
                                            @foreach($CustomeData as $customer)
                                                <option value="{{$customer->id}}">{{$customer->name}} ({{$customer->contact_1}})</option>
                                                @endforeach
                                        </select>
                                        {{--<i class="form-control" id="id_no" name="id_no"></i>--}}
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <select name="room_id" id="room_id" class="form-control input-sm" required="required">
                                            <option value="{{$roomDefaultData->id}}">Room No.: {{$roomDefaultData->room_no}}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="number" name="male" class="form-control input-sm" placeholder="No. of Male">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="number" class="form-control input-sm" name="female" placeholder="No. of Female">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control input-sm" name="relation" placeholder="Relaion">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control input-sm" name="purpose" placeholder="Purpose Of Visit">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="">Checked in Date</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="date" class="form-control input-sm" required="required" name="date" value="<?php echo date('Y-m-d') ?>">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="">Checked In Time</label>
                                    </div>
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
                                            document.getElementById('current_time').innerHTML="<input type='text' value='"+nhour+":"+nmin+":"+ap+"' name='time' class='form-control input-sm'>";
                                        }

                                        window.onload=function(){
                                            GetClock();
                                            setInterval(GetClock,1000);
                                        }
                                    </script>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;" id="current_time">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="hidden" value="CheckedIn" name="room_status">
                                        {{--<input type="hidden" name="room_status" value="CheckedIn">--}}
                                        <select class="form-control input-sm" disabled="disabled">
                                            <option value="CheckedIn">Checked In</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="">Room Rate</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" name="total_transaction" class="form-control input-sm">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="">Paid Amount</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" name="guest_paid" class="form-control input-sm">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="">Remarks</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" name="remarks" class="form-control input-sm">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div style="width:100px; margin:10px auto;">
                                        <button type="submit" class="btn btn-default" style="background-color: #757575; color:#fff;">Done</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if($roomDefaultData->room_status == 'Booked')
                        @else
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel" style="border:1px solid #96223c;">
                            <div class="x_title">
                                <h2>Room Booking</h2>
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
                            <div class="x_content" style="text-align: center;">
                                <form action="" data-parsley-validate method="post"
                                      enctype="multipart/form-data" class="form-horizontal form-label-left">
                                    {{csrf_field()}}
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control input-sm" name="customer_name" placeholder="Insert Guest Name">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <select name="room_id" id="room_id" class="form-control input-sm">
                                            <option value="{{$roomDefaultData->id}}">Room No.: {{$roomDefaultData->room_no}}</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="room_status" value="Booked">
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="number" name="male" class="form-control input-sm" placeholder="No. of Male">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="number" class="form-control input-sm" name="female" placeholder="No. of Female">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control input-sm" name="relation" placeholder="Relaion">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control input-sm" name="purpose" placeholder="Purpose Of Visit">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control input-sm" name="phone" placeholder="Mobile Number">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control input-sm" placeholder="Mobile Number">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="">Booking Date</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="date" class="form-control input-sm" name="date" value="<?php echo date('Y-m-d') ?>">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="">Arrival Time</label>
                                    </div>
                                    {{--<div id="time"></div>--}}
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;" id="time">
                                        <input type="time" class="form-control" name="time" id="time">
                                        <i>hr:min:AM/PM</i>
                                    </div>

                                    <div class="clearfix"></div>
                                    <div style="width:100px; margin:10px auto;">
                                        <button type="submit" class="btn btn-default" style="background-color: #757575; color:#fff;">Book</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        @endif
                        @endif
                </div>
            </div>
        </div>
    </div>

@endsection