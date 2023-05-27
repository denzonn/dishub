<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" width="30" height="30" href="{{ asset('frontend/img/logoperhubungan.png') }}"
        type="image/x-icon">

    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
</head>

<body>
    @include('includes.navbar')

    @yield('content')

    @include('includes.footer')


    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
</body>

</html>
