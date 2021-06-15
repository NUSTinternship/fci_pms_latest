<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>NUST Postgraduate Management System</title>

    <!-- Styles -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body class="bg-white">
    <div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0 bg-white">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" style="height: 70px; width: 320px;" class="img-fluid"
                        alt="NUST Logo">
                </a>
                @if (Route::has('login'))
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @auth
                            @if (Auth::user()->user_type == 'Student')
                                <a href="{{ url('/student') }}" class="nav-link">Home</a>
                            @elseif (Auth::user()->user_type == "Supervisor")
                                <a href="{{ url('/supervisor') }}" class="text-sm text-gray-700 underline">Home</a>
                            @elseif (Auth::user()->user_type == "HOD")
                                <a href="{{ url('/hod') }}" class="nav-link">Home</a>
                            @elseif (Auth::user()->user_type == "Administrator")
                                <a href="{{ url('/admin/home') }}" class="nav-link">Home</a>
                            @else
                                <a href="{{ url('/fhdc') }}" class="nav-link">Home</a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="nav-link">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            @endif
                        @endauth
                    </ul>
                </div>
                @endif
            </div>
        </nav>

        <div class="container">
            <div class="row h-100">
                <div class="col-sm-12 my-auto">
                    <div class="w-25 mx-auto text-center">
                        <img src="{{ asset('images/home.png') }}" class="img-fluid" alt="Responsive image">
                    </div>
                    <div class="w-100 mx-auto text-center font-weight-bold">
                        <p style="color: #1b2d5d; font-size: 30px">Faculty of Computing & Informatics <br></p>
                        <p style="color: #1b2d5d; font-size: 20px">Postgraduate Management System</p>
                    </div>
                </div>
            </div>
        </div>


        <!--<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <img src="{{ asset('images/home.png') }}" class="img-fluid" alt="Responsive image">
            </div>
        </div>-->
    </div>
</body>

</html>
