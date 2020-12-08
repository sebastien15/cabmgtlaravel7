<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>OrnaSol</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body class="bg-white min-h-screen font-base" style="font-family: lato;">
<div id="app" class="margin-0 box-border">

    <div class="flex flex-col md:flex-row">

        <div class="w-full md:flex-1">
            <base-nav></base-nav>
            <main>
                <!-- Replace with your content -->
                <div class=" py-6">
                    @yield('content')
                </div>
                <!-- /End replace -->
            </main>
            <base-footer></base-footer>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
{{-- 
    <div class="fixed w-full h-full bg-blue-100 z-50 top-0 text-blue-500 hidden" id="registerform">
        <div class="px-3 py-1 text-2xl top-0 ml-auto 
                 text-white border-2 border-white rounded-full 
                 w-10 mt-3 mr-3 cursor-pointer hover:border-blue-400 hover:text-blue-400" id="registerclose">X</div>
        <div class="relative mt-28 w-5/12 m-auto p-4 bg-white shadow-sm">
            <div class="mb-3 text-center">
                <h3 class="font-bold text-xl">Register</h3>
            </div>
            <form class="mb-3" method="POST" action="/register">

                <div>
                    <h4 class="text-md font-light mb-1">Email:</h4>
                    <input type="text" class="text-md font-light py-2 px-3 w-full border border-blue-400 "/>
                </div>
                <div>
                    <h4 class="text-md font-light mb-1">Password:</h4>
                    <input type="text" class="text-md font-light py-2 px-3 w-full border border-blue-400 "/>
                </div>
                <div class="flex justify-between sm:justify-end">
                        <div class="p-2">
                            <input class="text-blue-500 text-md" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="text-blue-500 text-md" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                </div>                    
                <button type="submit" class="p-2 bg-blue-500 text-white w-full">Register</button>
            </form>
        </div>
    </div>

    <div class="fixed w-full h-full bg-blue-100 z-50 top-0 text-blue-500 hidden" id="loginform">
        <div class="px-3 py-1 text-2xl top-0 ml-auto 
                 text-white border-2 border-white rounded-full 
                 w-10 mt-3 mr-3 cursor-pointer hover:border-blue-400 hover:text-blue-400" id="loginclose">X</div>
        <div class="relative mt-28 w-5/12 m-auto p-4 bg-white shadow-sm">
            <div class="mb-3 text-center">
                <h3 class="font-bold text-xl">Login</h3>
            </div>
            <form class="mb-3" method="POST" action="/login">

                <div>
                    <h4 class="text-md font-light mb-1">Email:</h4>
                    <input type="text" class="text-md font-light py-2 px-3 w-full border border-blue-400 "/>
                </div>
                <div>
                    <h4 class="text-md font-light mb-1">Password:</h4>
                    <input type="text" class="text-md font-light py-2 px-3 w-full border border-blue-400 "/>
                </div>
                <div class="flex justify-between sm:justify-end">
                        <div class="p-2">
                            <input class="text-blue-500 text-md" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="text-blue-500 text-md" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                </div>                    
                <button type="submit" class="p-2 bg-blue-500 text-white w-full">Login</button>
            </form>
        </div>
    </div> --}}

</div>
</body>
</html>
