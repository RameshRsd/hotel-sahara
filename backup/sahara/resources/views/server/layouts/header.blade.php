@section('header')
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

@endsection

