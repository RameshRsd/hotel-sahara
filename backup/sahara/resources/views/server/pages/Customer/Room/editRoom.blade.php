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
                                <h2>Edit Room</h2>
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
                                <div style="width:400px;">
                                    <form action="" method="post">
                                        {{csrf_field()}}
                                        <select class="form-control" id="floor_id" name="floor_id">
                                            @foreach($FloorData as $floor)
                                            @if($roomData->floor_id == $floor->id)
                                            <option value="{{$floor->id}}">{{$floor->name}}</option>
                                                @endif
                                            @endforeach
                                            @foreach($FloorData as $floor)
                                                        <option value="{{$floor->id}}">{{$floor->name}}</option>
                                            @endforeach


                                        </select>
                                        <input type="number" class="form-control" name="room_no" value="{{$roomData->room_no}}" placeholder="Enter Room No.">
                                        <select class="form-control" id="room_type_id" name="room_type_id">
                                            @foreach($RoomTYpeData as $roomType)
                                                @if($roomType->id == $roomData->room_type_id)
                                                    <option value="{{$roomType->id}}">{{$roomType->name}}</option>
                                                @endif
                                            @endforeach
                                            @foreach($RoomTYpeData as $roomType)
                                                    <option value="{{$roomType->id}}">{{$roomType->name}}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-default" style="background-color: #757575; color:#fff;">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection