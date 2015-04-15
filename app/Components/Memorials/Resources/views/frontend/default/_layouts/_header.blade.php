<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title', 'Memorials')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Custom Fonts -->
    <link href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="{{asset('templates/frontend/default/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/jquery.bxslider/jquery.bxslider.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fancybox/jquery.fancybox.css?v=2.1.5')}}" media="screen" />
    @section('styles')
        {{-- Here goes the page level styles --}}
    @show

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>