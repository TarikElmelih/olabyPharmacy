<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">

<title>@yield('title', 'Default Title')</title>

<link rel="shortcut icon" type="image/x-icon" href="{{ asset('/admin_assets/img/favicon.jpg') }}">

<link rel="stylesheet" href="{{ asset('/admin_assets/css/bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ asset('/admin_assets/css/animate.css') }}">

<link rel="stylesheet" href="{{ asset('/admin_assets/css/dataTables.bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ asset('/admin_assets/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('/admin_assets/plugins/fontawesome/css/all.min.css') }}">

<link rel="stylesheet" href="{{ asset('/admin_assets/css/style.css') }}">
<link rel="stylesheet" href="public/assets/css/font.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500&display=swap" rel="stylesheet">

<style>
    body{
        font-family: 'Cairo', sans-serif;
        direction:rtl;
    }
</style>
</head>
<body>

<div id="global-loader">
<div class="whirly-loader"> </div>
</div>




    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')

    @yield('content')









<script src="{{ asset('/admin_assets/js/jquery-3.6.0.min.js') }}"></script>

<script src="{{ asset('/admin_assets/js/feather.min.js') }}"></script>

<script src="{{ asset('/admin_assets/js/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('/admin_assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/admin_assets/js/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('/admin_assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('/admin_assets/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('/admin_assets/plugins/apexchart/chart-data.js') }}"></script>

<script src="{{ asset('/admin_assets/js/script.js') }}"></script>
</body>
</html>
