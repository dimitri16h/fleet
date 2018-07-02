<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fleet</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
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
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body class="bg-dark text-light">

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="dropdown-menu bg-dark" id="navbarNavAltMarkup">
            <a class="dropdown-item text-light" href="/">Home</a>
            <a class="dropdown-item text-light" href="#">TODO</a>
            <a class="dropdown-item text-light" href="#">TODO</a>
            <a class="dropdown-item text-light disabled" href="#">TODO</a>
        </div>

        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}" class="text-light">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-light">Login</a>
                    <a href="{{ route('register') }}" class="text-light">Register</a>
                @endauth
            </div>
        @endif
    </nav>



    <div class="title m-b-md h-50  text-center align-middle" 
        style="
            background-image: url(https://image.shutterstock.com/z/stock-photo-big-red-semi-truck-on-highway-748195210.jpg); 
            background-position: center center;
            background-size:100%;
            display: flex;
  justify-content: center;
  align-items: center;">
                <flex class="text-light">
                    Fleet
                </flex>
    </div>



    <nav class="flex-center position-ref links">
            <a href="#">Analytics</a>
            <a href="#">Load Management</a>
            <a href="#">IFTA Assistance</a>
            <a href="#">Invoicing</a>
    </nav>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
