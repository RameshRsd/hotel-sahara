@section('aside')
    <div class="col-md-3 left_col">
        @foreach($server as $codeData)
            @if($codeData->name < date('Y-m-d'))
             @else
                @if(Auth::user()->user_status =='1')
                <div class="left_col scroll-view">
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                    <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                                    </li>
                                    @if(\Illuminate\Support\Facades\Auth::user()->user_type =='admin' || Auth::user()->user_status =='2')
                                    <li><a href="{{route('addUser')}}"><i class="fa fa-user"></i> Users</a></li>
                                    <li><a><i class="fa fa-user"></i> Customer Entry <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('addCustomer')}}">Add Customer</a>
                                            </li>
                                            <li><a href="{{route('viewCustomer')}}">View Customer</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('roomBook')}}"><i class="fa fa-user"></i> Room Book</a></li>
                                    <li><a href="{{route('roomCheck')}}"><i class="fa fa-user"></i> Room Check In</a></li>
                                    @if(Auth::user()->user_type =='ramesh')
                                    <li><a href="{{route('addValidation')}}"><i class="fa fa-user"></i> Server Control</a></li>
                                        @endif
                                    @else
                                    <li><a><i class="fa fa-user"></i> Customer Entry <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('addCustomer')}}">Add Customer</a>
                                            </li>
                                            <li><a href="{{route('viewCustomer')}}">View Customer</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('roomBook')}}"><i class="fa fa-user"></i> Room Book</a></li>
                                    <li><a href="{{route('roomCheck')}}"><i class="fa fa-user"></i> Room Check In</a></li>

                                    @endif
                                </ul>
                        </div>
                        <div class="menu_section">

                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{route('logout')}}">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
                @else
                @endif
            @endif
        @endforeach
        @if(Auth::user()->user_status =='2')
                <div class="left_col scroll-view">
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                                </li>
                                @if(\Illuminate\Support\Facades\Auth::user()->user_type =='admin' || Auth::user()->user_status =='2')
                                    <li><a href="{{route('addUser')}}"><i class="fa fa-user"></i> Users</a></li>
                                    <li><a><i class="fa fa-user"></i> Customer Entry <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('addCustomer')}}">Add Customer</a>
                                            </li>
                                            <li><a href="{{route('viewCustomer')}}">View Customer</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('roomBook')}}"><i class="fa fa-user"></i> Room Book</a></li>
                                    <li><a href="{{route('roomCheck')}}"><i class="fa fa-user"></i> Room Check In</a></li>
                                    @if(Auth::user()->user_type =='ramesh')
                                        <li><a href="{{route('addValidation')}}"><i class="fa fa-user"></i> Server Control</a></li>
                                    @endif
                                @else
                                    <li><a><i class="fa fa-user"></i> Customer Entry <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="{{route('addCustomer')}}">Add Customer</a>
                                            </li>
                                            <li><a href="{{route('viewCustomer')}}">View Customer</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('roomBook')}}"><i class="fa fa-user"></i> Room Book</a></li>
                                    <li><a href="{{route('roomCheck')}}"><i class="fa fa-user"></i> Room Check In</a></li>

                                @endif
                            </ul>
                        </div>
                        <div class="menu_section">

                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{route('logout')}}">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
         @endif

    </div>
@stop