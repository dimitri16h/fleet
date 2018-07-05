<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap 4.1.1-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link href="{{ asset('css/landing.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">
</head>

<body class="text-light text-center container-fluid">

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="dropdown-menu bg-dark" id="navbarNavAltMarkup">
            <a class="dropdown-item text-light active" href="/">Home</a>
            <a class="dropdown-item text-light" href="#">Analytics</a>
            <a class="dropdown-item text-light" href="#">Truck Management</a>
            <a class="dropdown-item text-light disabled" href="#">IFTA Assistance</a>
            <a class="dropdown-item text-light disabled" href="#">Invoicing</a>
        </div>

        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}" class="text-light">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-light p-3">Login</a>
                    <a href="{{ route('register') }}" class="text-light">Register</a>
                @endauth
            </div>
        @endif
    </nav>



    <!-- Title / Image Div -->
    <div id="title-div" class="title">
        <flex class="text-light">
            Fleet
        </flex>
    </div>





    <div style="background-color: #03002e;" class="mt-1 p-3 text-center">
        
        <p id="questionText">What can we do for you?<p>
        
        <div class="row justify-content-center" style="height: 108px;">
            <button class="btn-secondary text-center p-1 m-2 col col-sm-3 btn">
                <img src="{{ asset('img/graph.png') }}"></img>
                <div>Analytics</div>
            </button>

            <button class="btn-secondary text-center p-1 m-2 col col-sm-3 btn">
                <img src="{{ asset('img/truck.png') }}"></img>
                <div>Truck Management</div>
            </button>
        </div>

        <div class="row justify-content-center" style="height: 108px;">
            <button class="btn-secondary text-center p-1 m-2 col col-sm-3 btn">
                <img src="{{ asset('img/taxes.png') }}"></img>
                <div>IFTA Assistance</div>
            </button>

            <button class="btn-secondary text-center p-1 m-2 col col-sm-3 btn">
                <img src="{{ asset('img/invoice1.png') }}"></img>
                <div>Invoicing</div>
            </button>
        </div>
    </div>


















    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
