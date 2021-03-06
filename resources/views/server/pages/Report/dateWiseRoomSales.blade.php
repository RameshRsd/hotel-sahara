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
                                        <div class="col-sm-1">
                                            <label for="">Room No.</label>
                                        </div>
                                        <div class="col-sm-1">
                                            <select name="room_id" id="" class="form-control input-sm">
                                                <option value="">[Select Room]</option>
                                                @foreach($RoomDataValue as $Value)
                                                        <option value="{{$Value->id}}" @if(request('room_id') == $Value->id) selected @endif>{{$Value->room_no}}</option>
                                                @endforeach
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
                                        @if(request('date1') && !request('date2'))
                                            Dated on : <b>{{request('date1')}}</b><br>
                                        @endif
                                        @if(request('date1') && request('date2'))
                                            From : <b>{{request('date1')}}</b> to <b>{{request('date2')}}</b><br>
                                        @endif
                                        Total : <i style="color:Green; font-weight: bolder;">{{count($RoomData)}}</i> Room @if(count($RoomData)<=1)Sale @else Sales @endif !

                                        <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Room</th>
                                            <th>No. of Sales</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($RoomDataValue as $key=>$Value)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>
                                                    @if($Value->room_status == 'CheckedIn')
                                                        <a href="{{url('admin/'.$Value->id.'/RoomStatus')}}" class="btn btn-danger btn-xs">{!! $Value->room_no !!}</a>
                                                    @elseif($Value->room_status == 'CheckedOut')
                                                        <a href="#" class="btn btn-success btn-xs">{!! $Value->room_no !!}</a>
                                                    @else
                                                        <a href=#"" class="btn btn-warning btn-xs">{!! $Value->room_no !!}</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @php $room_data_value=$RoomData->where('room_id',$Value->id)->count(); @endphp
                                                {{$room_data_value}}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tbody>
                                        <tr>
                                            <th colspan="2" style="text-align: right;">Total</th>
                                            <th>{{count($RoomData)}} Room Sales</th>
                                        </tr>
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