<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="//cdn.materialdesignicons.com/4.1.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ mix('vendor/css/AuthModule.css') }}">

    @yield('stylesheet')
</head>
<body class="form-layout">
    <div class="form">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://github.com/tbosch/autofill-event/blob/cdf6c328e1ca472c00daa8f10403910ddd958f30/src/autofill-event.js"></script>
    <script src="{{ mix('vendor/js/AuthModule.js') }}"></script>
    @yield('javascript')
</body>
</html>
