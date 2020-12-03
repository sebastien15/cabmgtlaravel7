<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OrnaSol</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="bg-white min-h-screen font-base" style="font-family: lato;">
<div id="app" class="margin-0 box-border">
    <div class="flex flex-col md:flex-row">
        <div class="w-full md:flex-1">
            <main>
                <!-- Replace with your content -->
                <div class="bg-blue-100">
                    @yield('content')
                </div>
                <!-- /End replace -->
            </main>
        </div>
    </div>

</div>
</body>
</html>
