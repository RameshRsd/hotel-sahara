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

                                    <div class="col-sm-7 col-md-7 col-xs-12">
                                                                    <form action="{{url('roomCheck/'.$roomData->id.'/updateBill')}}" method="post">
                                                                        {{csrf_field()}}
                                                                        <h5>Transaction Date: {{$roomData->date}}</h5>
                                                                        <label for="">Total Transaction</label>
                                                                        <input type="text" class="form-control" name="total_transaction" value="{{$roomData->total_transaction}}" placeholder="Total Bill">
                                                                        <div style="margin:10px 0;"></div>
                                                                        <label for="">Paid</label>
                                                                        <input type="text" class="form-control" name="guest_paid" value="{{$roomData->guest_paid}}" placeholder="Paid">
                                                                        <label for="">Discount</label>
                                                                        <input type="text" class="form-control" name="guest_discount" value="{{$roomData->guest_discount}}" placeholder="Discount">
                                                                        <div style="margin:10px 0;"></div>
                                                                        <label for="">Due (Total Due :
                                                                        @foreach($guestData as $guest)
                                                                                @if($guest->customer_id == $roomData->customer_id)
                                                                                    @if(!$roomData->customer_id)
                                                                                        @else
                                                                                     {{$guest->guest_due}}+                                                                                        @endif
                                                                                    @endif
                                                                        @endforeach
                                                                        ) // Previous Due + Current Due</label>
                                                                        <input type="text" class="form-control" name="guest_due" value="{{$roomData->guest_due}}" placeholder="Due">
                                                                        <div style="margin:10px 0;"></div>
                                                                        <label for="">Remarks</label>
                                                                        <input type="text" class="form-control" name="remarks" value="{{$roomData->remarks}}">
                                                                        <div style="margin:10px 0;"></div>
                                                                        <button type="submit" class="btn btn-default" style="background-color: #757575; color:#fff;">Update</button>
                                                                    </form>
                                                                </div>
                                    <div class="col-sm-5 col-md-5 col-xs-12" style=" text-align: center;">
                                                                    @foreach($customer as $customerValue)
                                                                        @if($customerValue->id == $roomData->customer_id)
                                                                            <img src="{{url('public/images/Customer/'.$customerValue->photo)}}" alt="image not found" width="100">
                                                                            <br><br><b>{{$customerValue->name}}</b><br>(<i>{{$customerValue->contact_1}}</i>)
                                                                            <br>
                                                                                @foreach($locationData as $location)
                                                                                    @if($location->id == $customerValue->location_id)
                                                                                        {{$location->name}}-{{$customerValue->ward_no}}, {{$customerValue->tole}}<br>
                                                                                    @endif
                                                                                @endforeach
                                                                                @foreach($districtData as $district)
                                                                                    @if($district->id == $customerValue->district_id)
                                                                                        {{$district->name}},
                                                                                    @endif
                                                                                @endforeach
                                                                                @foreach($zoneData as $zone)
                                                                                    @if($zone->id == $customerValue->zone_id)
                                                                                        {{$zone->name}} Zone<br>
                                                                                    @endif
                                                                                @endforeach
                                                                                @foreach($countryData as $country)
                                                                                    @if($country->id == $customerValue->country_id)
                                                                                        {{$country->country_name}}
                                                                                    @endif
                                                                                @endforeach
                                            <br>

                                                                            <i>{{$customerValue->id_type}} (ID No.): {{$customerValue->customer_id_no}}</i>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection