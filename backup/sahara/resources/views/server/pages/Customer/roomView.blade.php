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
                                <i style="float: right;"><a href="{{route('roomView')}}" style="margin:0; padding:2px; background-color: grey; color:#fff;" class="btn btn-xs" >View All</a></i>
                                <i style="float: right; margin:0 5px;"><a href="" style="margin:0; padding:2px; background-color: grey; color:#fff;" class="btn btn-xs"  data-toggle="modal" data-target="#room_modal">Add Rooms</a></i>
                                <i style="float: right; margin:0 5px;"><a href="" style="margin:0; padding:2px; background-color: grey; color:#fff;" class="btn btn-xs"  data-toggle="modal" data-target="#floor_modal">Add Room Floor</a></i>
                                <i style="float: right;"><a href="" style="margin:0; padding:2px; background-color: grey; color:#fff;" class="btn btn-xs"  data-toggle="modal" data-target="#roomType_modal">Add Room Type</a></i>
                                <h2>Room No./Room Type/Floor list</h2>
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
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div style="border:1px solid #96223c; padding:5px;">
                                        <h5 style="color:Green; font-weight: bolder;">Room List</h5>
                                        <table class="table-condensed table-bordered table-hover" style="width: 100%;">
                                            <tr style="background-color: #96223c; color:#fff;">
                                                <th>SN</th>
                                                <th>Room No.</th>
                                                <th>Room Type</th>
                                                <th>Room Floor</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach($roomData as $key=>$roomSts)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$roomSts->room_no}}</td>
                                                    <td>
                                                        @foreach($roomTypeData as $roomType)
                                                            @if($roomType->id == $roomSts->room_type_id)
                                                                {{$roomType->name}}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($floorData as $floor)
                                                            @if($floor->id == $roomSts->floor_id)
                                                                {{$floor->name}}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>

                                                        @if(\Illuminate\Support\Facades\Auth::user()->user_type =='admin')
                                                            <a href="{{url('roomView/'.$roomSts->id.'/editRoom')}}" class="btn btn-primary btn-xs">Edit</a>
                                                            <a href="{{url('roomView/delete/'.$roomSts->id)}}" onclick="return confirm('Are you sure you want to delete this Record?');"  class="btn btn-danger btn-xs">Delete</a>
                                                        @else
                                                            <a class="btn btn-primary btn-xs" disabled="disabled">Edit</a>
                                                            <a disabled="disabled" class="btn btn-danger btn-xs">Delete</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div style="border:1px solid #96223c;  padding:5px;">
                                        <h5 style="color:Green; font-weight: bolder;">Room Type List</h5>
                                        <table class="table-condensed table-bordered table-hover" style="width: 100%;">
                                            <tr  style="background-color: #96223c; color:#fff;">
                                                <th>SN</th>
                                                <th>Room Type</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach($roomTypeData as $key=>$Value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>
                                                        {{$Value->name}}
                                                    </td>
                                                    <td>

                                                        @if(\Illuminate\Support\Facades\Auth::user()->user_type =='admin')
                                                            <a href="{{url('roomViewRoomType/'.$Value->id.'/editRoomType')}}" class="btn btn-primary btn-xs">Edit</a>
                                                            <a href="{{url('roomViewRoomType/delete/'.$Value->id)}}" onclick="return confirm('Are you sure you want to delete this Record?');"  class="btn btn-danger btn-xs">Delete</a>
                                                        @else
                                                            <a class="btn btn-primary btn-xs" disabled="disabled">Edit</a>
                                                            <a disabled="disabled" class="btn btn-danger btn-xs">Delete</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div style="border:1px solid #96223c;padding:5px;">
                                        <h5 style="color:Green; font-weight: bolder;">Room Floor List</h5>
                                        <table class="table-condensed table-bordered table-hover" style="width: 100%; ">
                                            <tr style="background-color: #96223c; color:#fff;">
                                                <th>SN</th>
                                                <th>Room Floor</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach($floorData as $key=>$Value)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>
                                                        {{$Value->name}}
                                                    </td>
                                                    <td>

                                                        @if(\Illuminate\Support\Facades\Auth::user()->user_type =='admin')
                                                            <a href="{{url('roomViewRoomFloor/'.$Value->id.'/editRoomFloor')}}" class="btn btn-primary btn-xs">Edit</a>
                                                            <a href="{{url('roomViewRoomFloor/delete/'.$Value->id)}}" onclick="return confirm('Are you sure you want to delete this Record?');"  class="btn btn-danger btn-xs">Delete</a>
                                                        @else
                                                            <a class="btn btn-primary btn-xs" disabled="disabled">Edit</a>
                                                            <a disabled="disabled" class="btn btn-danger btn-xs">Delete</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top:25px;" class="modal fade" id="room_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                        @foreach($floorData as $floor)
                                            <option value="{{$floor->id}}">{{$floor->name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="number" class="form-control" name="room_no" placeholder="Enter Room No.">
                                    <select class="form-control" id="room_type_id" name="room_type_id">
                                        <option value="">Select Room Type</option>
                                        @foreach($roomTypeData as $roomType)
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
                                        @foreach($floorData as $roomType)
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
                                        @foreach($roomTypeData as $roomType)
                                            <option>{{$roomType->name}}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-default" style="background-color: #757575; color:#fff;">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection