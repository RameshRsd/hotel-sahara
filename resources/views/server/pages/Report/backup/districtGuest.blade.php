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
                                    <h4>District Wist Guest Status</h4>
                                    <a href="{{route('Report')}}" style="margin:0; color:#fff;" class="pull-right btn btn-primary btn-xs">Main-Menu</a>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form action="{{route('districtWiseGuest')}}" method="post">
                                        {{csrf_field()}}
                                    <table>
                                        <tr>
                                            <th>District</th>
                                            <td>
                                                <select name="district_id" id="" class="form-control input-sm">
                                                    <option value="">[Select District]</option>
                                                    @foreach($District as $value)
                                                        @if(request('district_id') == $value->id)
                                                            <option selected="selected" value="{{$value->id}}">{{$value->name}}</option>
                                                        @else
                                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                                        @endif
                                                        @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="2"><button>Show</button></th>
                                        </tr>
                                    </table>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
@endsection