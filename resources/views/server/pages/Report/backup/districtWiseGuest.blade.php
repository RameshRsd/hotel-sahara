<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{url('public/icon.png')}}">
    <title>@yield('title',$title) || {{Auth::user()->name}}</title>
    <link rel="stylesheet" href="{{url('public/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('public/bootstrap/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('public/bootstrap/css/nprogress.css')}}">
    <link rel="stylesheet" href="{{url('public/bootstrap/css/prettify.min.css')}}">
    <link rel="stylesheet" href="{{url('public/bootstrap/css/custom.min.css')}}">
    <link rel="stylesheet" href="{{url('public/bootstrap/ckeditor/contents.css')}}">
    <link rel="stylesheet" href="{{url('public/bootstrap/css/custom.css')}}">
    {{--<link rel="stylesheet" href="{{url('public/bootstrap/css/bootstrap.min.css')}}">--}}



</head>
<body class="nav-md">
<div class="container body">
<div class="main_container">
        <div class="right_col" role="main">
            <div class="content-sec">
                <div class="col-md-12">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h4>District Wist Guest Status</h4>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                    <table class="table-condensed table-bordered table-hover" style="width: 100%;">
                                        <tr>
                                            <th>SN</th>
                                            <th>Guest Name</th>
                                            <th>Gender</th>
                                            <th>District</th>
                                            <th>VDC/NP/MNP</th>
                                            <th>Ward No.</th>
                                            <th>Contact Number</th>
                                            <th>Reg No.</th>
                                            <th>Customer ID</th>
                                            <th>Remarks</th>
                                        </tr>
                                        @if(count($customerData)>0)
                                        @foreach($customerData as $key=>$guest)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$guest->name}}</td>
                                                <td>{{$guest->gender}}</td>
                                                <td>
                                                    @foreach($District as $district)
                                                        @if($district->id == $guest->district_id)
                                                            {{$district->name}}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>{{$guest->location_id}}</td>
                                                <td>{{$guest->ward_no}}</td>
                                                <td>{{$guest->contact_1}} {{$guest->contact_2}} {{$guest->contact_3}}</td>
                                                <td>{{$guest->id}}</td>
                                                <td>{{$guest->customer_id_no}}<br>({{$guest->id_type}})</td>
                                                <td></td>
                                            </tr>
                                            @endforeach
                                            @else
                                        <tr>
                                            <td colspan="10" style="color:Red; text-align: center;">Record Not Found <button>
                                                    <a href="{{route('districtGuest')}}" style="color:#000;">Back</a></button></td>
                                        </tr>
                                        @endif
                                    </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="pull-right">
            Design by <a href="http://geniusservicenepal.com/" target="_blank" style="color:Blue;">Genius Service Nepal Pvt. Ltd</a>
        </div>
        <div class="clearfix"></div>
    </footer>
</div>
</div>





<script src="{{url('public/bootstrap/js/jquery.min.js')}}"></script>
<script src="{{url('public/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/bootstrap/js/fastclick.js')}}"></script>
<script src="{{url('public/bootstrap/js/nprogress.js')}}"></script>
<script src="{{url('public/bootstrap/js/bootstrap-wysiwyg.min.js')}}"></script>
<script src="{{url('public/bootstrap/js/jquery.hotkeys.js')}}"></script>
<script src="{{url('public/bootstrap/js/prettify.js')}}"></script>
<script src="{{url('public/bootstrap/js/jquery.hotkeys.js')}}"></script>
<script src="{{url('public/bootstrap/js/custom.min.js')}}"></script>
<script src="{{url('public/bootstrap/js/custom.js')}}"></script>
</body>
</html>
