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
                                    <h4>Room Report</h4>
                                    <a href="{{route('Report')}}" style="margin:0; color:#fff;" class="pull-right btn btn-primary btn-xs">Main-Menu</a>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form action="{{route('dateWiseRoomSales')}}" method="post">
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
                                        {{--<div class="col-sm-1">--}}
                                            {{--<label for="">Room No.</label>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-2">--}}
                                            {{--<select name="room_id" id="" class="form-control input-sm">--}}
                                                {{--<option value="">[Select Room]</option>--}}
                                                {{--@foreach($RoomDataValue as $Value)--}}
                                                    {{--@if(request('room_id') == $Value->id)--}}
                                                        {{--<option value="{{$Value->id}}" selected="selected" >{{$Value->room_no}}</option>--}}
                                                    {{--@else--}}
                                                        {{--<option value="{{$Value->id}}">{{$Value->room_no}}</option>--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                        {{--</div>--}}
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
                            </div>
                            <div class="x_panel">
                                <div class="x_content">
                                    <table class="table-condensed table-bordered table-hover" style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Room</th>
                                            <th>No. of Sales</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($RoomData as $key=>$category)
                                            <tr>
                                                <th>{{++$key}}</th>
                                                <th>{!! $category->room_no !!}</th>
                                                <th>{!! Count($category->roomCheck) !!}</th>
                                            </tr>
                                        @endforeach
                                        {{--@foreach($RoomData as $key=>$value)--}}
                                        {{--<tr>--}}
                                            {{--<th>{{++$key}}</th>--}}
                                            {{--<th>{{$value->room_no}}</th>--}}
                                            {{--<th>--}}
                                                {{--@foreach($RoomCheck as $room)--}}
                                                    {{--@if($room->room_id == $value->id)--}}
                                                       {{--{{count('value')}}--}}

                                                        {{--@endif--}}
                                                    {{--@endforeach--}}
                                            {{--</th>--}}
                                        {{--</tr>--}}
                                            {{--@endforeach--}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
@endsection