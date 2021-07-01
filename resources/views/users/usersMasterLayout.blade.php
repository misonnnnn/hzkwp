<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>HZKWP</title>
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#4285f4">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#4285f4">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#4285f4">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ url('/resources/icon.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/usersDashboard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/usersClients.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>



    <style type="text/css">
        .notifPopup {
            width: 300px;
            position: absolute;
            z-index: 99999;
            right: 0px;
            background: #fff;
            padding:10px;
            margin:10px;
            border-radius: 5px;
            display: none;
        }
        .notifPopup img {
            position: relative;
            width: 25px;
            height: 25px;
        }
        .notifPopup .toast-body {
            font-size: 13px;
        }
        .notifPopup hr {
            margin:4px;
        }
        .newNotifBadge {
            position: absolute;
            height: 7px;
            width: 7px;
            border-radius: 10px;
            background: #f0bb42;
            margin-top: 0px;
            margin-left: -5px;
            display: none;

        }
    </style>
</head>
<body>
    <!-- notification popup -->
    <div class="toast notifPopup" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="https://scontent.fmnl3-4.fna.fbcdn.net/v/t1.6435-9/118022489_638348273471632_1201347962864693145_n.jpg?_nc_cat=104&ccb=1-3&_nc_sid=09cbfe&_nc_ohc=0AnimkL9Qs8AX_Z6DS8&_nc_ht=scontent.fmnl3-4.fna&oh=7e0172cab9f39cbf1f1562b4be6c4fa5&oe=60E06880" class="rounded mr-2">
            <strong class="mr-auto">HZK</strong>
            <small>11 mins ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <hr>
        <div class="toast-body">
            Horray! A new Client signed a contract with us. Cheers!
        </div>
    </div>

    <!-- !notif -->


    <nav class="navbar mainNav">
        <a href="#" class="navbar-brand">
            <i class="fa fa-cubes" style="color:#f0bb42"></i>
            HZKWP
        </a>
        <ul class="nav float-lg-right">
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-search"></i></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" class="notifBtn" data-toggle="dropdown"><i class="fa fa-bell"></i><span class="newNotifBadge"></span></a>
                <div class="dropdown-menu notifdropdown-menu animate slideIn" aria-labelledby="navbarDropdown">
                    <h6 class="dropdown-header"><i class="fa fa-bell"></i><b> Notifications</b></h6>
                    <hr style="margin:7px">
                    <div class="notificationDiv">
                        <a href="#" data-toggle="tooltip" data-placement="left" title="Today at 12:03pm" class="notifUnread"><i class="fa fa-bell"></i> An Accountant wants to connect with you</a>
                        
                    </div>
                    
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" data-toggle="dropdown"><i class="fa fa-user"></i></a>
                <div class="dropdown-menu animate slideIn" aria-labelledby="navbarDropdown">
                    <h6 class="dropdown-header"><i class="fa fa-user"></i><b> {{ Auth::user()->name }} </b></h6>
                    <hr style="margin:5px">
                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> View Profile</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
                    <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>

            </li>
        </ul>
    </nav>
    <div class="navbarDownDiv container-fluid"></div>

    <div class="sidebar">
        <div class="sidebarProfileDiv">
            <img src="{{ asset('resources/'.auth::user()->picture) }}">
            <p class="sidebarProfileName">{{ Auth::user()->name}}</p>
            <p class="sidebarProfilePosition">{{ Auth::user()->position}}</p>
        </div>

        <div class="mainMenu">
            <p class="mainMenuGeneralText">General</p>
             <ul class="nav sidebarMainmenu">
                <li class="nav-item 
                {{ Request::segment(1) == 'home' ? 'nav-item-active' : ''}}"
                style="width: 100%" >
                    <a class="nav-link" href="{{ url('home')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>

                <li class="nav-item 
                {{ Request::segment(1) == 'clients' ? 'nav-item-active' : ''}}"
                style="width: 100%" >
                    <a class="nav-link" href="{{ url('clients')}}">
                        <i class="fas fa-users"></i>
                        Clients
                    </a>
                </li>

                <li class="nav-item" style="width: 100%" >
                    <a class="nav-link" href="#">
                        <i class="fas fa-user-friends"></i>
                        Accountants
                    </a>
                </li>

                <li class="nav-item" style="width: 100%" >
                    <a class="nav-link" href="#">
                        <i class="fas fa-file"></i>
                        Files
                    </a>
                </li>

                <li class="nav-item" style="width: 100%" >
                    <a class="nav-link" href="#">
                        <i class="fas fa-wrench"></i>
                        Settings
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




    @yield('content')

    <script type="text/javascript">
        (function($) {
            $.fn.clickToggle = function(func1, func2) {
                var funcs = [func1, func2];
                this.data('toggleclicked', 0);
                this.click(function() {
                    var data = $(this).data();
                    var tc = data.toggleclicked;
                    $.proxy(funcs[tc], this)();
                    data.toggleclicked = (tc + 1) % 2;
                });
                return this;
            };
        }(jQuery));
        
       

       $('.sidebarToggleBtn').clickToggle(
        function() {   
            $(".sidebar").addClass("sidebarOff");
            $(".sidebar").removeClass("sidebarOn");
            $(".mainContentOuter").addClass("mainContentExpand");
            $(".mainContentOuter").removeClass("mainContentExpandOff");
        },
        function() {
            $(".sidebar").removeClass("sidebarOff");
            $(".sidebar").addClass("sidebarOn");
            $(".mainContentOuter").removeClass("mainContentExpand");
            $(".mainContentOuter").addClass("mainContentExpandOff");
        });

        $(document).ready(function(){
            $(".notifPopup").hide();
            setInterval(() => {
            $.ajax({
              type : 'GET',
              url: '{{url("countClientTable")}}',
              success:function(response) {
                var TEN_SEC = 3000;
                if( (new Date() - new Date(response[0]['created_at'])) < TEN_SEC ){
                    var audio = new Audio('{{ url("resources/notif.mp3") }}');
                    audio.play();
                    $(".notifPopup").slideDown();
                    $(".newNotifBadge").show();
                }
                setInterval(() => {
                      $(".notifPopup").slideUp();  
                }, 1500);
              }
              
            });
          }, 1500);


            $(".notifBtn").click(function(){
                $(".newNotifBadge").hide();
            });

        });
        var html = '';
        $.ajax({
            type : 'GET',
            url: '{{url("/loadNotifications")}}',
            success:function(response) {
                for(var i = 0; i < response.length; i++) {
                    html += 
                        '<a href="#" data-toggle="tooltip" data-placement="left" title="'+ moment(response[i]['created_at']).fromNow() +'" class="notifUnread">'
                        +'<i class="fa fa-bell"></i> '
                        +'<b>'+ response[i]['title'] +' </b>'
                        +response[i]['body']
                        +'</a>' 
                    }
                $('.notificationDiv').html(html);

            },error:function(response){
                alert(JSON.stringify(response));
            }
        })
    </script>
