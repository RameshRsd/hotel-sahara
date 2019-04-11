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
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="report">
                                        <h5>Guest Report</h5>
                                        <table>
                                            <tr>
                                                <td><a href="{{route('districtGuest')}}"><button>District Wise Guest Details</button></a></td>
                                            </tr>
                                            <tr>
                                                <td><a href=""><button>Room Wise Guest Details</button></a></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="report">
                                        <h5>Room Report</h5>
                                        <table>
                                            {{--<tr>--}}
                                                {{--<td><a href=""><button>District Wise Guest Details</button></a></td>--}}
                                            {{--</tr>--}}
                                            {{--<tr>--}}
                                                {{--<td><a href=""><button>District Wise Guest Details</button></a></td>--}}
                                            {{--</tr>--}}
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
@endsection