<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mahadan</title>
    @vite('resources/sass/app.scss')
    @stack('after_styles')
</head>

<body>
    <div id="app">
        @include('frontend.includes.navbar')
        @yield('content')
        @include('frontend.includes.footer')

    </div>

    @vite('resources/js/app.js')
    @stack('after_scripts')
</body>

</html>
