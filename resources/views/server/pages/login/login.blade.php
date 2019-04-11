<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{url('public/icon.png')}}">
    <title>Login || Hotel Sahara Inn || Guest Management Database</title>
    <link rel="stylesheet" href="{{url('public/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('public/bootstrap/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('public/bootstrap/css/nprogress.css')}}">
    <link rel="stylesheet" href="{{url('public/bootstrap/css/prettify.min.css')}}">
    <link rel="stylesheet" href="{{url('public/bootstrap/css/custom.min.css')}}">
</head>
<body style="background-image: url({{url('public/images/hotelsaharainn.png')}}); background-color: #fff;">
<div class="container">
    <div style="width:200px; margin:100px auto; text-align: center; ">
        <section class="login_content">
            @if(session('error'))
                <span class="alert alert-danger"> {{session('error')}}</span>
            @endif
            @if(session('success'))
                <span class="alert alert-success"> {{session('success')}}</span>
            @endif
        <h4 style="background-color: #96223c; color:#fff; padding:8px; margin-top: 20px;">Log In</h4>
            <form method="post" action="{{route('login')}}">
                {{csrf_field()}}
                        <input type="text" class="form-control" name="name" placeholder="User Name">
            <div style="margin:20px;"></div>
                        <input type="password"  class="form-control" name="password" placeholder="password">
            <button type="submit" class="btn btn-default" style="background-color: #96223c; color:#fff;">Log in</button>
        </form>
        </section>
    </div>
</div>
</body>
</html>