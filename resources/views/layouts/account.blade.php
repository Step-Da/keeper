<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="<?php echo csrf_token(); ?>">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('account-site-title')</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://kit.fontawesome.com/6b092b8925.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        
        <!-- Link -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="icon" href="{{ URL::asset('favicon.svg') }}" type="image/x-icon"/> 
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" />
    </head>
    <body>
        <div id="app">
            <div class="w-full h-full">
                <div class="flex flex-no-wrap">
                    @include('includes.navbar')
                    <div class="w-full h-full">
                        @include('includes.sidebar')
                        <div class="container mx-auto py-10 h-64 md:w-4/5 w-11/12 px-6">
                            <main class="w-full h-full">
                                @yield('content')
                            </main>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
