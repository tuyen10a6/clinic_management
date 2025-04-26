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
</html>
