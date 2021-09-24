<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SystemTAIS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .btn{
                background-color: white;
                border-radius: 50px;
            }
        </style>
    </head>
    <body background="/img/ia.jpg">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('home') }}" style="color: white;">Home</a>
                        <a href="{{ url('/home') }}" style="color: white;">{{ Auth::user()->name }}</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" style="color: white;">SALIR</a>
                        <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a class="btn" style="color: rgb(12, 44, 87)" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a class="btn" style="color: rgb(12, 44, 87)" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    <b style="color: rgb(255, 255, 255)">SystemTAIS</b>
                </div>

                <div class="links">
                    <!--<a style="color: rgb(12, 44, 87)" href="#">Mision</a>
                    <a style="color: rgb(12, 44, 87)" href="#">Vision</a>
                    <a style="color: rgb(12, 44, 87)" href="#">Nosotros</a>-->
                </div>
            </div>
        </div>
    </body>
</html>
