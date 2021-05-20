<!-- <h4>Hi users! you are logged In! </h4>
<a class="dropdown-item" href="{{ route('logout') }}"
   onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
 -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/usersDashboard.css') }}">

    <style type="text/css">
        
    </style>
</head>
<body>
    <nav class="navbar mainNav">
        <a href="#" class="navbar-brand">
            <i class="fa fa-cubes" style="color:#f0bb42"></i>
            HZKWP
        </a>
        <ul class="nav float-lg-right">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-search"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-bell"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-user"></i></a>
            </li>
        </ul>
    </nav>
    <div class="navbarDownDiv container-fluid"></div>

    <div class="sidebar">
        <div class="sidebarProfileDiv">
            <img src="{{ asset('resources/dp.jpg') }}">
            <p class="sidebarProfileName">{{ Auth::user()->name}}</p>
            <p class="sidebarProfilePosition">Accountant</p>
        </div>

        <div class="mainMenu">
            <p class="mainMenuGeneralText">General</p>
             <ul class="nav sidebarMainmenu">
                <li class="nav-item nav-item-active" style="width: 100%" >
                    <a class="nav-link" href="#">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>

                <li class="nav-item" style="width: 100%" >
                    <a class="nav-link" href="#">
                        <i class="fas fa-users"></i>
                        Clients
                    </a>
                </li>

                <li class="nav-item" style="width: 100%" >
                    <a class="nav-link" href="#">
                        <i class="fas fa-file"></i>
                        Files
                    </a>
                </li>

                <li class="nav-item" style="width: 100%" >
                    <a class="nav-link" href="{{ url('/logout') }}">
                        <i class="fas fa-sign-out-alt"></i>
                        Log out
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container-fluid mainContentOuter">
        <div class="mainContent">
            <div class="sidebarToggleBtn">
                <span class="x1"></span>
                <span class="x2"></span>
                <span class="x3"></span>
            </div>

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <i class="fa fa-home"></i> Home
                </li>
                <li class="breadcrumb-item">
                    <i class="fa fa-tachometer-alt"></i> Dashboard
                </li>
            </ol>
        </div>
    </div>
</body>
</html>
    
    