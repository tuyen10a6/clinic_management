<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/assets/css/dashlite.css')}}">
    <title></title>
</head>
<body style="margin: 0px !important;">
    @include('layouts/customer/header')
    @yield('content')
    @include('layouts/customer/footer')
</body>
    <script src="{{asset('vendor/assets/js/dashlite.js')}}"></script>
    <script src="{{asset('vendor/assets/js/app.js')}}"></script>
    <script src="{{ asset('/core/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/core/js/nioapp.min.js') }}"></script>
    <script src="{{ asset('/core/js/clipboard.min.js') }}"></script>
    <script src="{{ asset('/core/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/core/js/scripts.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/customer.js') }}"></script>
    <script>
        const SEARCH_DOCTOR_HOME = "{{route('search-doctor')}}";
        const URL_PROJECT = "http://127.0.0.1:3003/storage";
    </script>
@yield('script')
</html>
