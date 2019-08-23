<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ 'css/Zdrojowa.css' }}">
    <link rel="stylesheet" href="{{ mix('vendor/css/AuthModule.css') }}">

    @yield('stylesheet')
</head>
<body class="form-layout">
    <div class="form">
        @yield('content')
    </div>

    <script src="/js/jquery.js"></script>
    <script src="/js/jquery.autofill.js"></script>
    <script src="{{ mix('vendor/js/AuthModule.js') }}"></script>
    @yield('javascript')
</body>
</html>
