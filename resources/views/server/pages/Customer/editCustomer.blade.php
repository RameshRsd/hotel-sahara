@extends($masterPath.'.master.master')

@section('content')

    <div class="main_container">
        <div class="right_col" role="main">
            <div class="content-sec">
                <div class="col-md-12">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel" style="border:1px solid #96223c;">
                            <div class="x_title">
                                <h2>Guest Record Update</h2>
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
                                    <input type="hidden" name="user_id" value="{{$updateCustomer->user_id}}">

                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="name">Customer Name</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control" name="name" value="{{$updateCustomer->name}}">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <select name="gender" id="" class="form-control input-sm">
                                            <option value="{{$updateCustomer->gender}}">
                                                @if($updateCustomer->gender == 'male')Male
                                                    @elseif($updateCustomer->gender == 'female')Female
                                            @else
                                                    Other
                                            @endif
                                            </option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <select name="nationality" id="nationality" class=" input-sm form-control">
                                            <option value="{{$updateCustomer->nationality}}">{{$updateCustomer->nationality}}</option>
                                            <option value="Nepali">Nepali</option>
                                            <option value="Foreign">Foreign</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <select name="id_type" id="id_type" class="form-control input-sm">
                                            <option value="{{$updateCustomer->id_type}}">{{$updateCustomer->id_type}}</option>
											<option value="Pan-No">Pan No.</option>
                                            <option value="Citizenship">Citizenship</option>
                                            <option value="Passport">Passport</option>
                                            <option value="Driving License">Driving License</option>
                                            <option value="Voter Card">Voter Card</option>
                                            <option value="Vehicle No.">Vehicle No.</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" name="customer_id_no"  class="form-control" value="{{$updateCustomer->customer_id_no}}">
                                    </div>

                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="country_name">Select Country</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <select class=" input-sm form-control" id="country_name" name="country_id">
                                            @foreach($country_list as $cat)
                                                @if($cat->id == $updateCustomer->country_id)
                                                <option value="{{$cat->id}}">{{$cat->country_name}}</option>
                                                @endif
                                            @endforeach
                                                <option value="">[Select Country]</option>
                                            @foreach($country_list as $cat)
                                                <option value="{{$cat->id}}">{{$cat->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="zone_name">Select Zone</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <select class="form-control input-sm" id="zone_name" name="zone_id">
                                            @foreach($zoneData as $zone)
                                                @if($zone->id == $updateCustomer->zone_id)
                                                    <option value="{{$zone->id}}">{{$zone->name}}</option>
                                                @endif
                                            @endforeach
                                                <option value="">[Select zone]</option>
                                                @foreach($zoneData as $zone)

                                                        <option value="{{$zone->id}}">{{$zone->name}}</option>
                                                    @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="District">Select District</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <select class=" input-sm form-control" id="district_name" name="district_id">
                                            @foreach($districtData as $district)
                                                @if($district->id == $updateCustomer->district_id)
                                                    <option value="{{$district->id}}">{{$district->name}}</option>
                                                @endif
                                            @endforeach
                                                <option value="">[Select District]</option>
                                            @foreach($districtData as $district)
                                                    <option value="{{$district->id}}">{{$district->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="Vdc">Select VDC/Np</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <select class=" input-sm form-control" id="vdc_name" name="location_id">
                                            @foreach($locationData as $vdc)
                                                @if($vdc->id == $updateCustomer->location_id)
                                                    <option value="{{$vdc->name}}">{{$vdc->name}}</option>
                                                @endif
                                            @endforeach
                                                <option value="">[Select VDC]</option>
                                            @foreach($locationData as $vdc)
                                                    <option value="{{$vdc->id}}">{{$vdc->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="ward_no">Ward No.</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control" name="ward_no" value="{{$updateCustomer->ward_no}}">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="tole">Tole/Location</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control" name="tole" value="{{$updateCustomer->tole}}">
                                    </div>

                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="name">Contact</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control" name="contact_1" value="{{$updateCustomer->contact_1}}">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control" name="contact_2"  value="{{$updateCustomer->contact_2}}">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control" name="contact_3" value="{{$updateCustomer->contact_3}}">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control" name="fb_link" value="{{$updateCustomer->fb_link}}">
                                    </div>
                                    <div class="col-md-2 col-sm-3 col-xs-12" style="margin:5px 0;">
                                        <label for="photo">Upload Photo</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-6" style="margin:5px 0;">
                                        <input type="file" class="form-control" name="photo">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-6" style="margin:5px 0;">
                                        <img src="{{url('public/images/Customer/'.$updateCustomer->photo)}}" alt="image not found" width="50">
                                    </div>
                                    <div class="col-md-2 col-sm-3 col-xs-12" style="margin:5px 0;">
                                        <label for="customer_doc">Upload Document</label>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12" style="margin:5px 0;">
                                        <input type="file" class="form-control" name="customer_doc">
                                        <a href="{{url('public/images/Customer/'.$updateCustomer->customer_doc)}}" target="_blank">Show Uploaded Document</a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div style="width:100px; margin:10px auto;">
                                    <button type="submit" class="btn btn-default" style="background-color: #757575; color:#fff;">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection