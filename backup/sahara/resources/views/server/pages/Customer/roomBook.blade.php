@extends($masterPath.'.master.master')

@section('content')

    <div class="main_container">
        <div class="right_col" role="main">
            <div class="content-sec">
                <div class="col-md-12">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
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
                            <div class="x_title">
                                <h2>Room Book Record</h2>
                                <i style="float: right;"><a href="{{route('viewCustomer')}}" style="margin:0; padding:2px;" class="btn btn-success btn-xs">View Customer</a></i>
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


                                <table class="table-condensed table-bordered table-hover" style="width: 100%;">
                                    Total : <i style="color:Green; font-weight: bolder;">{{count($roomData)}}</i> Record Found !
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Date</th>
                                        <th>Male</th>
                                        <th>Female</th>
                                        <th>Relation</th>
                                        <th>Arrival time</th>
                                        <th>Booked Room</th>
                                        <th>Enter by</th>
                                        <th>Action</th>
                                    </tr>
                                    @if(count($roomData)>0)
                                        @foreach($roomData as $key=>$room)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$room->customer_name}}</td>
                                                <td>{{$room->phone}}</td>
                                                <td>{{$room->date}}</td>
                                                <td>{{$room->male}}</td>
                                                <td>{{$room->female}}</td>
                                                <td>{{$room->relation}}</td>
                                                <td>{{$room->time}}</td>
                                                <td>
                                                    @foreach($bookData as $value)

                                                        @if($value->id == $room->room_id && $value->room_status == 'Booked')
                                                        <a style="background-color: Orange; color:#fff; padding:5px;">{{$value->room_no}} <i>(Still Booked)</i></a>
                                                            @endif
                                                        @if($value->id == $room->room_id && $value->room_status == 'CheckedIn')
                                                        <a style="background-color: Red; color:#fff; padding:5px;">{{$value->room_no}} <i>(Checked In)</i></a>
                                                            @endif
                                                        @if($value->id == $room->room_id && $value->room_status == 'CheckedOut')
                                                        <a style="background-color: Green; color:#fff; padding:5px;">{{$value->room_no}} <i>(Room Left)</i></a>
                                                            @endif

                                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($userData as $user)
                                                        @if($user->id == $room->user_id)
                                                            {{$user->name}} ({{$user->user_type}})
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td style="padding:0;">
                                                    @foreach($bookData as $value)
                                                        @if($value->id == $room->room_id && $value->room_status == 'Booked')
                                                            <form action="{{url('roomBook/delete/'.$room->room_id)}}" method="post">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="room_status" value="CheckedOut">
                                                                <input type="hidden" name="date" value="">
                                                                <button type="submit" onclick="return confirm('Are you sure you want to Unbook this room?');" class="btn btn-danger btn-xs">UnBook</button>
                                                            </form>
                                                            @elseif($value->id == $room->room_id && $value->room_status == 'CheckedOut')
                                                            <form action="{{url('roomBook/delete/'.$room->room_id)}}" method="post">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="room_status" value="Booked">
                                                                <input type="hidden" name="date" value="{{date('Y-m-d')}}">
                                                                <button type="submit" onclick="return confirm('Are you sure you want to Book this room?');" class="btn btn-success btn-xs">Book</button>
                                                            </form>
                                                            <a href="{{url('roomBook/deleteItm/'.$room->id)}}" class="btn btn-danger btn-xs">Delete</a>
                                                        @endif
                                                        @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="11">Record Not Found</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection