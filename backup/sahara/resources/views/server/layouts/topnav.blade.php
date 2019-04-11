@section('top')
<div class="top_nav col-sm-12 col-xs-12"style="background-color: #96223c; position: fixed; z-index: 111111; padding-top:8px;">
    <div id="sidebar-menu" class="col-sm-9 col-xs-12">
        <div class="menu_section" style="margin-bottom: 0;">
            <ul class="nav side-menu">
                @if(\Illuminate\Support\Facades\Auth::user()->user_type =='admin' || Auth::user()->user_status =='2')
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li><a href="{{route('addUser')}}"><i class="fa fa-user"></i> Users</a></li>
                    {{--<li><a><i class="fa fa-user"></i> Customer Entry <span class="fa fa-chevron-down"></span></a>--}}
                        {{--<ul class="nav child_menu">--}}
                            {{--<li><a href="{{route('addCustomer')}}">Add Customer</a>--}}
                            {{--</li>--}}
                            {{--<li><a href="{{route('viewCustomer')}}">View Customer</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <li><a href="{{route('addCustomer')}}"><i class="fa fa-user"></i> Customer Entry</a></li>
                    <li><a href="{{route('viewCustomer')}}"><i class="fa fa-user"></i> Customer Details</a></li>
                    <li><a href="{{route('roomBook')}}"><i class="fa fa-user"></i> Room Book</a></li>
                    <li><a href="{{route('roomCheck')}}"><i class="fa fa-user"></i> Room Check In</a></li>
                    @if(Auth::user()->user_type =='ramesh')
                        <li><a href="{{route('addValidation')}}"><i class="fa fa-user"></i> Server Control</a></li>
                    @endif
                @elseif(Auth::user()->user_status =='0')
                @else
                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li><a href="{{route('addCustomer')}}"><i class="fa fa-user"></i> Customer Entry</a></li>
                    <li><a href="{{route('viewCustomer')}}"><i class="fa fa-user"></i> Customer Details</a></li>
                    <li><a href="{{route('roomBook')}}"><i class="fa fa-user"></i> Room Book</a></li>
                    <li><a href="{{route('roomCheck')}}"><i class="fa fa-user"></i> Room Check In</a></li>

                @endif
            </ul>
        </div>
    </div>
    <div class="col-sm-3 col-xs-12">
        <nav>
            {{--<div class="nav toggle">--}}
                {{--<a id="menu_toggle"><i class="fa fa-bars"></i></a>--}}
            {{--</div>--}}
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right" style="color:#2cd2e4;">
                        <li><a href="{{url('/')}}"><i class="fa fa-user" aria-hidden="true"> {{Auth::user()->name}} ({{(Auth::user()->user_type)}})</i></a></li>
                        <li><a href="{{route('password')}}"><i class="fa fa-retweet" aria-hidden="true"> Change Password</i></a></li>
                        <li><a href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"> Log Out</i></a></li>
                    </ul>
                </li>
                <li>
                    <img src="{{url('public/images/userimages/'.Auth::user()->image)}}" class="img-responsive" style="border-radius: 45%; border:1px  solid #808080; background-color: #fff;" alt="" width="60">
                </li>
            </ul>
        </nav>
    </div>
</div>

    @stop