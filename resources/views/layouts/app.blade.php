<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sample Notes App</title>
    <!--Styles/scripts-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head-scripts')
</head>

<body>
    <div class="app-container">
        @yield('content')
    </div>

    @stack('scripts')
</body>

</html>
