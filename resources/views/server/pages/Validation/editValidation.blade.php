@extends($masterPath.'.master.master')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::user()->user_type =='ramesh')
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
                            <div class="x_title">
                                <h2>Edit Validation</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br/>

                                <form action="" data-parsley-validate method="post"
                                      enctype="multipart/form-data" class="form-horizontal form-label-left">

                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Enter Expiry Date
                                            *
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="date" name="name" class="form-control col-md-7 col-xs-12" value="{{date('Y-m-d')}}">
                                            {{$errors->first('name')}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-success">Generate</button>
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
                                <a class="btn btn-danger btn-xs">Server Error ! Please Contact Ramesh Dahal : 9856065444</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection