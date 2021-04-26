<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <link rel="icon" href="{{ asset('./img/logo.png')}}" type="image/png">

        <!-- Css -->
        <link rel="stylesheet" href="{{ asset('./dist/styles.css')}}">
        <link rel="stylesheet" href="{{ asset('./dist/all.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
        
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">

        <!--Container -->
        <div class="mx-auto bg-grey-400">
            <!--Screen-->
            <div class="min-h-screen flex flex-col">
                <!--Header Section Starts Here-->
                @if(Route::has('login'))
                    @auth
                        @livewire('navigation-menu')
                    @else
                    
                    <header class="bg-gray-500 border-b border-gray-200">
                        <div class="flex justify-between">
                            <div class="p-1 mx-3 inline-flex items-center">
                                <i
                                    class="fas fa-bars pr-2 text-white"
                                    onclick="sidebarToggle()"
                                ></i>
                                <img class="mx-3" src="{{ asset('./img/logo.png') }}" alt="">
                                <a
                                href="{{ url('/') }}"                                    
                                    class="text-white p-2 no-underline italic"
                                    >Sewa Tenda</a
                                >
                            </div>
                            <div class="p-1 flex flex-row items-center">
                                <a
                                    href="{{route('login')}}"
                                    class="text-white p-2 mr-2 no-underline"
                                    >Login</a
                                >
                                <a
                                href="{{ route('register') }}"
                                    onclick="profileToggle()"
                                    class="text-white p-2 no-underline"
                                    >Register</a
                                >
                            </div>
                        </div>
                    </header> 

                    @endauth
                @endif
                <!--/Header-->

                <div class="flex flex-1">
                <!--Sidebar-->
                    <aside
                        id="sidebar"
                        class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block"
                    >
                        <ul class="list-reset flex flex-col">
                        <li
                            class="w-full h-full py-3 px-2 border-b border-light-border bg-white"
                        >
                            <a
                            href="#"
                            class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline"
                            >

                            Sewa Tenda
                            <span><i class="fas fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                        <li
                            class="w-full h-full py-3 px-2 border-b border-light-border bg-white"
                        >
                            <a
                            href="#"
                            class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline"
                            >
                                                
                            Info Lebih Lanjut
                            <span><i class="fas fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                                                    
                        </ul>
                    </aside>
                    <!--/Sidebar-->

                    <!--Main-->
                        @yield('main')
                    <!--/Main-->
                </div>
                
                <!--Footer-->
                <footer class="bg-grey-darkest text-white p-2">
                    <div class="flex flex-1 mx-auto">&copy; Agungb</div>
                </footer>
                <!--/footer-->
            </div>
        </div>    

        <script src="{{asset('./js/main.js')}}"></script>

        @stack('modals')        
        @livewireScripts
    </body>
</html>
