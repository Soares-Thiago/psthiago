<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0000edf7fe.js" crossorigin="anonymous"></script>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Thiago Soares</title>

    @stack('styles')
</head>
<body>
    
    <div class='container'>
        @yield('content')
    </div>    

    @stack('scripts')
    
</body>
</html>