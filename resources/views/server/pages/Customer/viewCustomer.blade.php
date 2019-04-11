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
                                <h2>Guest Record</h2>
                                <i style="float: right;"><a href="{{route('addCustomer')}}" style="margin:0; padding:2px;" class="btn btn-success btn-xs">Add Guest Profile</a></i>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form action="" method="post">
                                    {{csrf_field()}}
                                    <div class="col-sm-2">
                                        <select name="district_id" id="" class="form-control input-sm">
                                            <option value="">[Select District}</option>
                                            @foreach($districtData as $value)
                                                @if(request('district_id') == $value->id)
                                                    <option selected="selected" value="{{$value->id}}">{{$value->name}}</option>
                                                @else
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                @endif
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-2">
                                        <input type="text" name="name" value="{{request('name')}}" class="form-control input-sm" placeholder="Search by Name">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-sm-2">
                                        <input type="text" name="id_no" value="{{request('id_no')}}"class="form-control input-sm" placeholder="Search by ID">
                                    </div>
                                        <div class="clearfix"></div>
                                    <div class="col-sm-2">
                                        <input type="text" name="contact_1" value="{{request('contact_1')}}" class="form-control input-sm" placeholder="Search by Phone">
                                    </div>
                                            <div class="clearfix"></div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-default" style="background-color: #757575; color:#fff; width: 100%;">Search</button>
                                    </div>
                                </form>
                            </div>
                            <div class="x_content" style="text-align: center;">
                                Total : <i style="color:Green; font-weight: bolder;">{{count($customerData)}}</i> Record Found !
                                <table class="table-condensed table-bordered table-hover" style="width: 100%;">
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Regd No.</th>
                                        <th>Gender</th>
                                        <th>Nationality</th>
                                        <th>Address</th>
                                        <th>ID no.</th>
                                        <th>Contact</th>
                                        <th>Photo</th>
                                        <th>Document</th>
                                        <th>Enter BY</th>
                                        <th>Social Link</th>
                                        <th>Action</th>
                                    </tr>
                                    @if(count($customerData)>0)
                                        @foreach($customerData as $key=>$customer)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$customer->name}}</td>
                                                <td>{{$customer->id}}</td>
                                                <td>{{$customer->gender}}</td>
                                                <td>{{$customer->nationality}}</td>
                                                <td>
												@if($customer->nationality == 'Nepali')

                                                    @foreach($districtData as $district)
                                                            @if($district->id == $customer->district_id)
                                                                {{$district->name}}, {{$customer->location_id}}
                                                            @endif
                                                        @endforeach
														@elseif($customer->nationality == 'Foreign')
                                                    @foreach($countryData as $country)
                                                        @if($country->id == $customer->country_id)
                                                            {{$country->country_name}}
                                                                @endif
                                                        @endforeach
														@else
														@endif
                                                </td>
                                                <td>{{$customer->customer_id_no}}<br>({{$customer->id_type}})</td>
                                                <td>{{$customer->contact_1}}</td>
                                                <td><a href="{{url('public/images/Customer/'.$customer->photo)}}" target="_blank"><img src="{{url('public/images/Customer/'.$customer->photo)}}" alt="image not found" width="50"></a></td>
                                                <td><a href="{{url('public/images/Customer/'.$customer->customer_doc)}}" target="_blank">Open</a></td>
                                                <td>
                                                    @foreach($userData as $user)
                                                        @if($user->id == $customer->user_id)
                                                            {{$user->name}} ({{$user->user_type}})
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td><a href="{{$customer->fb_link}}" target="_blank">{{$customer->fb_link}}</a></td>
                                                <td style="padding:0;">
                                                    @if(\Illuminate\Support\Facades\Auth::user()->user_type =='admin')
                                                    <a href="{{url('viewCustomer/'.$customer->id.'/editCustomer')}}" class="btn btn-primary btn-xs">Edit</a>
                                                    <a href="{{url('viewCustomer/'.$customer->id.'/viewCustomerDetails')}}" class="btn btn-warning btn-xs">View</a>
                                                    <a href="{{url('viewCustomer/delete/'.$customer->id)}}" onclick="return confirm('Are you sure want to delete this Record? Please Make Sure Room Checked Out By this Customer, Otherwise room status still checked in');" class="btn btn-danger btn-xs">delete</a>
                                                @else
                                                        <a href="{{url('viewCustomer/'.$customer->id.'/viewCustomerDetails')}}" class="btn btn-primary btn-xs">View</a>
                                                        <a disabled="disabled" class="btn btn-danger btn-xs">delete</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="11">Record Not Found</td>
                                        </tr>
                                     @endif
									    <tr>
                                            <td colspan="11">{{ $customerData->links() }}</td>
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