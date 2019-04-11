@extends($masterPath.'.master.master')

@section('content')

    <div class="main_container">
        <div class="right_col" role="main">
            <div class="content-sec">
                <div class="col-md-12">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel" style="border:1px solid #96223c;">
                            <div class="x_title">
                                <h2>Guest Profile</h2>
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
                                <div class="row">
                                    <div class="col-sm-12 com-md-12 col-xs-12">
                                        <img src="{{url('public/images/Customer/'.$updateCustomer->photo)}}" alt="image not found" width="200">
                                        <br>
                                        <i>{{$updateCustomer->id_type}} (ID No.): {{$updateCustomer->customer_id_no}}</i>
                                        <br><b>{{$updateCustomer->name}} </b>({{$updateCustomer->gender}})<br>(<i>{{$updateCustomer->contact_1}}</i>)
                                        <br>
                                        <b>Customer Registration No. :</b> <i style="color:Green; font-weight:bolder">{{$updateCustomer->id}}</i>
                                        <br>
                                        {{$updateCustomer->location_id}}
                                        @foreach($districtData as $district)
                                            @if($district->id == $updateCustomer->district_id)
                                                {{$district->name}},
                                            @endif
                                        @endforeach
                                        @foreach($zoneData as $zone)
                                            @if($zone->id == $updateCustomer->zone_id)
                                                {{$zone->name}} Zone<br>
                                            @endif
                                        @endforeach
                                        @foreach($countryData as $country)
                                            @if($country->id == $updateCustomer->country_id)
                                                {{$country->country_name}}
                                            @endif
                                        @endforeach
                                        <br>
                                        <a href="{{url('public/images/Customer/'.$updateCustomer->customer_doc)}}" style="color:Green;"><button>Open ID Document</button></a>
                                    @foreach($roomData as $room)
                                        @if($room->customer_id == $updateCustomer->id && $room->date == date('Y-m-d') && $room->room_status == 'CheckedIn')
                                            <br> <h4>Guest Now Stay in Room No. : {{$room->room_no}}</h4>
                                            @endif
                                        @endforeach

                                    </div>
                                </div>
                                    <div class="clearfix"></div>
                            </div>
                        </div>

                            <div class="x_panel" style="border:1px solid #96223c;">
                            <div class="x_title">
                                <h2>Guest Sales Details</h2>
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
                                <table class="table-condensed table-bordered table-hover" style="width: 100%;">
                                    <tr>
                                        <th>SN</th>
                                        <th>Transaction Date</th>
                                        <th>Room No.</th>
                                        <th>Total Bill</th>
                                        <th>Discount</th>
                                        <th>Paid</th>
                                        <th>Due</th>
                                        <th>Remarks</th>
                                    </tr>
                                    @foreach($roomCheck as $key=>$Guest)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$Guest->date}}</td>
                                            <td>
                                                @foreach($roomData as $roomValue)
                                                    @if($roomValue->id == $Guest->room_id)
                                                        {{$roomValue->room_no}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$Guest->total_transaction}}</td>
                                            <td>{{$Guest->guest_discount}}</td>
                                            <td>{{$Guest->guest_paid}}</td>
                                            <td>{{$Guest->guest_due}}</td>
                                            <td>{{$Guest->remarks}}</td>
                                        </tr>
                                        @endforeach
                                    <tr>
                                        <td colspan="3" style="text-align: center;">Total</td>
                                        <td>{{$total_bill}}</td>
                                        <td>{{$total_disc}}</td>
                                        <td>{{$total_paid}}</td>
                                        <td>{{$total_due}}</td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection