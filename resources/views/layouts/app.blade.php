<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous" defer></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black" rel="stylesheet">


    <!-- Shield UI -->
    <link rel="stylesheet" type="text/css" href="https://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <link id="gridcss" rel="stylesheet" type="text/css" href="https://www.shieldui.com/shared/components/latest/css/dark-bootstrap/all.min.css" />
    <script type="text/javascript" src="https://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="https://www.prepbootstrap.com/Content/js/gridData.js"></script>


    <!-- Custom Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>



@media only screen and (min-width: 768px) {
  /* The sidenav */
  .sidenav {
    height: 100%;
    width: 180px;
    position: fixed;
    z-index: 1;
    top: 35px;
    left: 0;
    overflow-x: hidden;
    padding-top: 20px;
    padding-left:20px;
  }
  /* Page content */
  .main {
    margin-left: 180px; /* Same as the width of the sidenav */
  }
  .sidenav > .nav-item {
    padding-bottom:20px;
  }
}
</style>

</head>
<body class="bg-6">



<div id="app">
    


    <nav class="navbar navbar-expand-md bg-7 fixed-top">
        @guest
            <a class="navbar-brand" href="/">
        @else
            <a class="navbar-brand" href="/home">
        @endguest
                <h5 class="text-light" style="font-family: sans-serif;">{{ config('app.name', 'Fleet') }}</h5>
            </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" z-index="9">
            <span class="navbar-toggler-icon">
                <i class="text-light fa fa-bars fa-1x"></i>
            </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-link">
                        <a href="{{ route('login') }}" class="text-light nav-item">Login</a>
                    </li>
                    <li class="nav-link">
                        <a href="{{ route('register') }}" class="text-light nav-item">Register</a>
                    </li>
                @else
                    <!-- <li>
                        <a href="{{ url('/home') }}" class="text-light nav-item mr-3">Home</a>
                    </li> -->
                    
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown2" class="nav-link dropdown-toggle pt-0 pb-0 text-light mr-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="/companies">
                            Companies
                          </a>

                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown1" class="nav-link dropdown-toggle pt-0 pb-0 text-light mr-3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{session('active-name', 'All Companies')}}
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <form method="post" action="/set-active">
                            <input type="hidden" name="active-co" value="">
                            <button type="submit" class="btn-link btn text-dark w-100">All Companies</button>
                             {{ csrf_field() }}
                          </form> 
                          @foreach(\Auth::user()->companies()->orderBy('id')->get() as $company)
                          <form method="post" action="/set-active">
                            <input type="hidden" name="active-co" value="{{$company->id}}">
                            <button type="submit" class="btn-link btn text-dark w-100">{{$company->name}}</button>
                             {{ csrf_field() }}
                          </form>
                          @endforeach
                        </div>
                    </li>
                @endguest

            </ul>
            <ul class="nav flex-column navbar-nav sidenav bg-7 navbar-dark">
              <li class="nav-item mt-3">
                <a class="nav-item text-light" href="/home">
                  <i class="fa fa-bullseye"></i>
                   Dashboard
                 </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-item text-light" href="/companies">
                  <i class="fa fa-building"></i> 
                   Companies
                </a>
              </li> -->
              <li class="nav-item">
                <a class="nav-item text-light" href="/trucks">
                  <i class="fa fa-truck-moving"></i>
                   Trucks
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-item text-light" href="/customers">
                  <i class="fa fa-users"></i>  
                   Customers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-item text-light" href="/orders">
                  <i class="fas fa-headset"></i>
                   Dispatch
                 </a>
              </li>
<!--               <li class="nav-item">
                <a class="nav-item text-light" href="/testold">
                  <i class="fas fa-chart-pie"></i>
                   Original Test
                </a>
              </li> -->
            </ul>
        </div>
    </nav>


    


    <main class="py-4 main" style="margin-top:56px;">
        @yield('content')
    </main>
</div>
</body>
</html>
