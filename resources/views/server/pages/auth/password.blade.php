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
                                <h2>Change Password</h2>
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
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-8 col-md-offset-2 {{ $errors->has('old_password') ? ' has-error' : '' }}">
                                            <label for="old_password">Current Password <font color="#ff0000">*</font></label>
                                            <input tabindex="1" type="password" class="form-control" id="old_password" name="old_password" placeholder="" data-validation="required" data-validation-error-msg="Current password is required">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-8 col-md-offset-2 {{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password">New Password <font color="#ff0000">*</font></label>
                                            <input tabindex="2" type="password" name="password" class="form-control" id="old_password" value="{{old('password')}}" placeholder="" data-validation="required" data-validation-error-msg="Password is required">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-8 col-md-offset-2 {{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password_confirmation">Confirm Password <font color="#ff0000">*</font></label>
                                            <input tabindex="2" type="password" name="password_confirmation" class="form-control" id="company_address" value="{{old('password')}}" placeholder="" data-validation="required" data-validation-error-msg="Confirm Password is required">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group  col-xs-offset-4  col-sm-8">
                                            <div class="hidden-sm hidden-md hidden-lg"><br></div>
                                            <button type="submit" tabindex="3" class="btn btn-primary btn-login">Update</button>
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
@endsection