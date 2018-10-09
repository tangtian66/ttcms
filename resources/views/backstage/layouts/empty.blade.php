<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <base href="{{URL::asset('')}}"/>

    <link rel="shortcut icon" href="favicon.ico">
    <link href="{{URL::asset('backstage/css/bootstrap.min.css?v=3.3.6')}}" rel="stylesheet">
    <link href="{{URL::asset('backstage/css/font-awesome.min.css?v=4.4.0')}}" rel="stylesheet">
    <link href="{{URL::asset('backstage/css/animate.css')}}" rel="stylesheet">
    <link href="{{URL::asset('backstage/css/style.css?v=4.1.0')}}" rel="stylesheet">
    @include('UEditor::head')
    @yield('mycss')
</head>

<body class="gray-bg">
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>@yield('title')</h2>
        <button type="button" class="btn btn-w-m btn-info" onclick="window.location.href=window.location.href;">刷新当前页面</button>
    </div>

</div>

<div class="wrapper wrapper-content">
    @yield('content')
</div>
<!-- 全局js -->
<script src="{{URL::asset('backstage/js/jquery.min.js?v=2.1.4')}}"></script>
<script src="{{URL::asset('backstage/js/bootstrap.min.js?v=3.3.6')}}"></script>
<script src="{{URL::asset('backstage/js/plugins/layer/layer.min.js')}}"></script>
<!-- 自定义js -->
<script src="{{URL::asset('backstage/js/content.js?v=1.0.0')}}"></script>
@yield('myjs')
</body>

</html>
