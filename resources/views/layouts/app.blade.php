<!DOCTYPE html>
<html lang="en" class="has-navbar-fixed-top">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    <div id="mainMenu">
        @auth
            <mainmenu :is-auth="true"></mainmenu>  
        @else 
            <mainmenu :is-auth="false"></mainmenu>  
        @endauth
    </div>

    @yield('content')

    <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
