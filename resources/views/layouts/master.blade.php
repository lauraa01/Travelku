<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
            color: whitesmoke;
        }

        .menu-wrap{
            display: flex;
        }

        .menu-wrap a{
            margin-right: 2rem;
            text-decoration: none;
            color: whitesmoke;
        }

        .web-name{
            padding: 0.5% 2%;
        }

        footer{
            display: flex;
            align-items: center;
            justify-content: center;

            background-color: #2c3e50;
            color: white;
            height: 8vh;
        }

        /* HOME */
        .see-more{
            margin-top: 1%;
        }

        .see-more a{
            padding: 1% 2%;
            text-decoration: none;
        }

        .button-content{
            -webkit-transition: 0.5s ease;
            background: #136cbf;
            box-shadow: 0px 1px 1px rgba(0,0,0,.5), 1px 1px 1px rgba(0,0,0,.3);
            color: white;
            font-weight: bold;
        }

        .button-content:hover{
            color: #262626;
            background-color: lightblue;
            font-weight: bold;
        }

        .intro{
            padding: 0 10%;
            height: 70vh;
            text-align: center;
            background-color: #2980b9;
            color: white;
        }

        .intro h4{
            padding-top: 25%;
            font-weight: bold;
            font-size: 1.3rem;
            margin-bottom: 2%;
        }

        .intro-about{
            display: inline-block;
            width: 40%;
        }

        .intro-about p{
            text-align: justify;
        }

        .intro img{
            float:right;
            width: 25vw;
            height: 50vh;
            padding-top: 5%;
        }

        .why-choose-us{
            padding-bottom: 10%;
        }

        .why-choose-us h1{
            padding: 5vh 0;
            text-align: center;
            font-size: 2rem;
            color: #005ce6;
        }

        .wrap-row{
            display: table;
            padding-left: 10%;
        }

        .wrap{
            display: table-cell;
            padding: 0 4.5rem;
        }

        .wrap h4{
            display: inline-block;
            font-weight: bold;
            margin: 5% 0;
        }

        .wrap img{
            padding-left: 10%;
        }

        /* PROFILE */
        .profile{
            padding: 10% 20%;
            background-image: url('assets/bg.png');
            background-repeat: no-repeat;
            background-position: center;
        }

        .profile-info{
            border: 2px solid gray;
            background: rgba(245, 245, 245, 0.8);
            width: 50vw;
            margin: 0 10% 5% 10%;
        }

        /* ROUTE */
        .routes{
            background-color: #52B3D9;
        }

        .rute img{
            width: 22vw;
            height: 50vh;
            padding-left: 3%;
        }

        .rute{
            display: inline-block;
            margin:0 2%;
            padding: 1% 5%;

            display: grid;
            grid-template-columns:repeat(3, 1fr);
            gap: 2%;
        }


        .info{
            background-color: #e2d6d6;
            width: 95%;
            border-radius: 5%;
            margin-top: 1%;
            margin-bottom: 5%;
            transition:0.5s ease;

            padding: 10% 2% 5% 5%;
        }

        .info:hover{
            -webkit-transform:scale(1.1);
        }

        </style>
</head>
<body>
    <header class="main-menu">
        <div class="menu-wrap">
            <h1 class="web-name">Travelku</h1>
            <nav class="show-nav" style="margin-top: 1.5%">
                <a href="{{ route('home')}}" class="menu" style="margin-left: 40rem">Home</a>
                <a href="{{ route('route')}}" class="menu">Route</a>
                <a href="{{ route('review')}}" class="menu">Review</a>
                <a href="{{ route('logout') }}" class="menu" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        Copyright © Travelku 2021
    </footer>

</body>
</html>
