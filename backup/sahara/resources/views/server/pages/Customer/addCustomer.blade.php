@extends($masterPath.'.master.master')

@section('content')

    <div class="main_container">
        <div class="right_col" role="main">
            <div class="content-sec">
                <div class="col-md-12">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel" style="border:1px solid #96223c;">
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
                                <h2>Customer Record Form</h2>
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
                                <form action="{{route('addCustomer')}}" data-parsley-validate method="post"
                                      enctype="multipart/form-data" class="form-horizontal form-label-left">
                                    {{csrf_field()}}
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="name">Customer Name</label>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control" name="name">
                                    </div>

                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <select name="nationality" id="nationality" class=" input-sm form-control">
                                            <option value="0" disabled="true" selected="true">[Nationality]</option>
                                            <option value="Nepali">Nepali</option>
                                            <option value="Foreign">Foreign</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <select name="id_type" id="id_type" class="form-control input-sm">
                                            <option value="">[Select ID Type]</option>
                                            <option value="Citizenship">Citizenship</option>
                                            <option value="Passport">Passport</option>
                                            <option value="Driving License">Driving License</option>
                                            <option value="Voter Card">Voter Card</option>
                                            <option value="Vehicle No.">Vehicle No.</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" name="customer_id_no"  class="form-control" placeholder="Enter ID No.">
                                    </div>

                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="country_name">Select Country</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <select class=" input-sm form-control" id="country_name" name="country_id">
                                            <option value="0" disabled="true" selected="true">Select Country</option>
                                            {{--@foreach($country_list as $cat)--}}
                                                {{--<option value="{{$cat->id}}">{{$cat->country_name}}</option>--}}
                                            {{--@endforeach--}}
                                        </select>
                                    </div>

                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="zone_name">Select Zone</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <select class="form-control input-sm" id="zone_name" name="zone_id">
                                            <option value=""selected="true">Select Zone</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="District">Select District</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <select class=" input-sm form-control" id="district_name" name="district_id">
                                            <option value="" selected="true">Select District</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="Vdc">Select VDC/Np</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <select class=" input-sm form-control" id="vdc_name" name="location_id">
                                            <option value="" selected="true">Select VDC/NP</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="ward_no">Ward No.</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control" name="ward_no">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="tole">Tole/Location</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control" name="tole">
                                    </div>

                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <label for="name">Contact</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control" name="contact_1" placeholder="Mobile Number">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control" name="contact_2" placeholder="Mobile Number">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control" name="contact_3" placeholder="Mobile Number">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12" style="margin:5px 0;">
                                        <input type="text" class="form-control" name="fb_link" placeholder="Insert Facebook Link">
                                    </div>
                                    <div class="col-md-2 col-sm-3 col-xs-12" style="margin:5px 0;">
                                        <label for="photo">Upload Photo</label>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12" style="margin:5px 0;">
                                        <input type="file" class="form-control" name="photo">
                                    </div>
                                    <div class="col-md-2 col-sm-3 col-xs-12" style="margin:5px 0;">
                                        <label for="customer_doc">Upload Document</label>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12" style="margin:5px 0;">
                                        <input type="file" class="form-control" name="customer_doc">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div style="width:100px; margin:10px auto;">
                                    <button type="submit" class="btn btn-default" style="background-color: #757575; color:#fff;">Save</button>
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