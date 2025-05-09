<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/assets/css/dashlite.css')}}">
    @yield('css')
    <title></title>
</head>
<body style="margin: 0px !important;">
<div class="nk-main">
    <div class="nk-sidebar nk-sidebar-fixed is-light">
        @include('layouts/admin/sidebar')
    </div>
    <div class="nk-wrap">
        @include('layouts/admin/header')
        <div style="margin-left: 280px" class="nk-content">
            @yield('content')
        </div>
    </div>
</div>
@yield('script')
<script src="{{asset('vendor/assets/js/dashlite.js')}}"></script>
<script src="{{asset('vendor/assets/js/app.js')}}"></script>
<script src="{{ asset('/core/js/jquery.min.js') }}"></script>
<script src="{{ asset('/core/js/nioapp.min.js') }}"></script>
<script src="{{ asset('/core/js/clipboard.min.js') }}"></script>
<script src="{{ asset('/core/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/core/js/scripts.js') }}"></script>
</body>
</html>
