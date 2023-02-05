<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href={{ asset('style.css') }} />
    @yield('css')
    <title>@yield('title')</title>

    @section('style')
        <style>
            body {
                display: grid;
                place-items: center;
            }
        </style>
    @show
</head>

<body>
    @yield('main')
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
    @yield('script')
</body>

</html>
