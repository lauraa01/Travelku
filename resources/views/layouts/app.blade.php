<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        *{
            /* font-family: "Museo" , Verdana , sans-serif; */
            margin: 0;
            padding: 0;
        }

        header{
            background-color: #136cbf;
            color: white;
            text-align: center;
        }

        #app{
            padding: 10%;
            background-image: url('assets/maldives.jpg');
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-position: center;
        }

        footer{
            display: flex;
            align-items: center;
            justify-content: center;

            background-color: #2c3e50;
            color: white;
            height: 8vh;
        }

        /* LOGIN & REGISTER */
        #Sign{
            text-align: center;
            color: white;
        }

        .resetPassword{
            width: 50vw;
            margin-left: 20%;
            border: 5px solid #fbfcfc;
            border-radius: 10%;
            background-color: rgba(44, 62, 80,0.7);
            text-align: center;
        }
    </style>
</head>
<body>
    <header class="fixed top-0 left-0 right-0 z-50">
        <div class="container mx-auto flex justify-between p-4">
            <h1 class="text-xl">Travelku</h1>
        </div>
    </header>

    <div id="app">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                        @endif

                        @if (Route::has('register'))
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>

        <main class="py-4">
            @yield('content')
        </main>

    </div>
    <footer>
        Copyright © Travelku 2021
    </footer>
</body>
</html>
