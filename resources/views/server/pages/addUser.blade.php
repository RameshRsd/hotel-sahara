@if(Auth::user()->name =='demo')
@else
    @extends($masterPath.'.master.master')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::user()->user_type =='admin' || Auth::user()->user_status =='2')
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
                        <div class="x_panel"  style="border:1px solid #96223c;">
                            <div class="x_title">
                                <h2>View User Record</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br/>
                                <table border="1" style="margin-bottom:30px;" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>User Name</th>
                                            <th>User Type</th>
                                            <th>Status</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($userData)>0)
                                    @foreach($userData as $key=>$userValue)
                                        @if($userValue->id == 0)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td colspan="4" style="color:red; text-align: center;">Visitor Data not visible</td>
                                                <td><img src="{{url('public/images/userimages/default.jpg')}}" alt="{{$userValue->name}}" width="60"></td>
                                                <td></td>
                                            </tr>
                                            @else
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$userValue->name}}</td>
                                            @if($userValue->user_type=='admin')
                                                <td>
                                                    @if($userValue->name == 'sahara')
                                                        <a class="btn btn-user btn-xs">Admin</a>
                                                        @else
                                                    <form action="{{url('addUser/'.$userValue->id.'/updateUserStatus')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" value="user" name="user_type">
                                                        <button type="submit" class="btn btn-user btn-xs">Admin</button><br>
                                                        <i>Click button to change user type</i>
                                                    </form>
                                                    @endif
                                                </td>
                                            @else
                                                <td>
                                                    <form action="{{url('addUser/'.$userValue->id.'/updateUserStatus')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" value="admin" name="user_type">
                                                        <button type="submit" class="btn btn-warning btn-xs">User</button><br>
                                                        <i>Click button to change user type</i>
                                                    </form>
                                                </td>
                                            @endif
                                            <td>
                                                @if(\Illuminate\Support\Facades\Auth::user()->id == $userValue->id)
                                                    @if($userValue->user_status=='0')

                                                            <a class="btn btn-warning btn-xs" disabled="disabled">Inactive</a>

                                                    @else
                                                            <a class="btn btn-success btn-xs" disabled="disabled">Active</a>
                                                    @endif
                                                    @else
                                                @if($userValue->user_status=='0')

                                                    <form action="{{url('addUser/'.$userValue->id.'/updateUserSts')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" value="1" name="user_status">
                                                        <button type="submit" class="btn btn-warning btn-xs">Inactive</button><br>
                                                        <i>Click button to change user status</i>
                                                    </form>

                                                    @else
                                                    <form action="{{url('addUser/'.$userValue->id.'/updateUserSts')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="hidden" value="0" name="user_status">
                                                        <button type="submit" class="btn btn-success btn-xs">Active</button><br>
                                                        <i>Click button to change user status</i>
                                                    </form>
                                                @endif
                                                @endif

                                            </td>
                                            <td><img src="{{url('public/images/userimages/'.$userValue->image)}}" alt="{{$userValue->name}}" width="60"></td>

                                            <td>
                                                @if(Auth::user()->id == $userValue->id)
                                                    <a disabled="disabled"  class="btn btn-info btn-xs">Edit</a>
                                                    <a disabled="disabled" class="btn btn-danger btn-xs">Delete</a>
                                                    @else
                                                    <a href="{{url('addUser/'.$userValue->id.'/editUser')}}" class="btn btn-info btn-xs">Edit</a>
                                                <a href="{{url('addUser/delete/'.$userValue->id)}}"  onclick="return confirm('Are you sure you want to delete this Record?');"  class="btn btn-danger btn-xs">Delete</a>
                                                @endif
                                            </td>

                                        </tr>
                                        @endif
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="7">Record Not Found</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="x_panel" style="border:1px solid #96223c;">
                            <div class="x_title">
                                <h2>Add User Record</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br/>

                                <form action="{{route('addUser')}}" data-parsley-validate method="post"
                                      enctype="multipart/form-data" class="form-horizontal form-label-left">

                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-name">User
                                            Name *
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="name" class="form-control col-md-7 col-xs-12">
                                            {{$errors->first('name')}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email
                                            *</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" type="text" name="email">
                                            {{$errors->first('email')}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Profile Picture</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" type="file" name="image">
                                            {{$errors->first('image')}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password *
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input name="password" class="date-picker form-control col-md-7 col-xs-12"
                                                   type="password">
                                            {{$errors->first('password')}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirmation Password *
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input name="password_confirmation"
                                                   class="date-picker form-control col-md-7 col-xs-12" type="password">
                                            {{$errors->first('confirmed')}}

                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    @else
        <div class="main_container">
            <div class="right_col" role="main">
                <div class="">
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
                                <a class="btn btn-danger btn-xs">Server Error ! Please Contact Hotel Sahara Inn, Macchapokhari</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@endif