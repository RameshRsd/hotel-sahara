@extends($masterPath.'.master.master')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::user()->user_type =='ramesh')
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
                                <h2>Validation Record</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br/>
                                <table border="1" style="margin-bottom:30px;" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Code</th>
                                            <th>Decryped Value</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($codeData as $key=>$code)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$code->name}}</td>
                                        <td>
                                        </td>
                                        <td></td>
                                        <td>
                                            <a href="{{url('addValidation/'.$code->id.'/editValidation')}}" class="btn btn-success btn-xs">Edit</a>
                                            <a href="{{url('addValidation/delete/'.$code->id)}}" class="btn btn-danger btn-xs">Delete</a>
                                        </td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Validation</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br/>

                                <form action="{{route('addValidation')}}" data-parsley-validate method="post"
                                      enctype="multipart/form-data" class="form-horizontal form-label-left">

                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Enter Expiry Date
                                            *
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="date" name="name" class="form-control col-md-7 col-xs-12">
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