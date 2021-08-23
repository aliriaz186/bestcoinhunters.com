<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <link href="{{asset('bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/stylesheet.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('')}}/assets/css/style.css">

    {{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"--}}
    {{--          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"--}}
    {{--          crossorigin="anonymous">--}}
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('jquery/3.5.1/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ \Illuminate\Support\Facades\URL::asset('popper/popper.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    {{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>--}}
    <style>
        .ajax-loader {
            visibility: hidden;
            background-color: rgba(255,255,255,0.7);
            position: absolute;
            z-index: +1000000 !important;
            width: 100%;
            height:100%;
        }

        .ajax-loader img {
            position: relative;
            top:50%;
            left:50%;
        }

        .bgactivelink{
            background: #eae4e4 !important;
            color: #6b9ce8!important;
        }

        .coloractivelink{
           color: black!important;
        }

    </style>
</head>
<body>

<div class="ajax-loader">
    <img src="{{ url('/ajax-loader.gif') }}" class="img-responsive" />
</div>
<?php
$user =  \App\Models\Admin::where('id',\Illuminate\Support\Facades\Session::get('adminId'))->first();
?>
<div id="app">


    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a class="navbar-brand" href="{{ url('/admin') }}">BestCoinHunters</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
{{--                    <div class="user-pic">--}}
{{--                        <img class="img-responsive img-rounded"--}}
{{--                             src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"--}}
{{--                             alt="User picture">--}}
{{--                    </div>--}}
                    <div class="user-info">
                        <h4 style="color: white">Welcome Admin</h4>
                    </div>
                </div>

                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="{{\Request::is('admin') ? 'bgactivelink' : ''}}" style="border: 1px solid white;border-bottom: 0px">
                            <a class="{{\Request::is('admin') ? 'coloractivelink' : ''}}" href="{{url('admin')}}">
{{--                                <i class="fa fa-tachometer-alt"></i>--}}
                                <span>DASHBOARD</span>
                            </a>
                        </li>
                        <li  class="{{\Request::is('coins') ? 'bgactivelink' : ''}}" style="border: 1px solid white;border-bottom: 0px">
                            <a class="{{\Request::is('coins') ? 'coloractivelink' : ''}}" href="{{url('coins')}}">
                                {{--                                <i class="fas fa-users"></i>--}}
                                <span>Coins</span>
                            </a>
                        </li>
                        <li  class="{{\Request::is('promotion') ? 'bgactivelink' : ''}}" style="border: 1px solid white;border-bottom: 0px">
                            <a class="{{\Request::is('promotion') ? 'coloractivelink' : ''}}" href="{{url('promotion')}}">
                                {{--                                <i class="fas fa-users"></i>--}}
                                <span>Promotion</span>
                            </a>
                        </li>
                        <li  class="{{\Request::is('banners') ? 'bgactivelink' : ''}}" style="border: 1px solid white;border-bottom: 0px">
                            <a class="{{\Request::is('banners') ? 'coloractivelink' : ''}}" href="{{url('banners')}}">
{{--                                <i class="fas fa-users"></i>--}}
                                <span>Banners</span>
                            </a>
                        </li>

                        <li  class="{{\Request::is('slider') ? 'bgactivelink' : ''}}" style="border: 1px solid white;border-bottom: 0px">
                            <a class="{{\Request::is('slider') ? 'coloractivelink' : ''}}" href="{{url('slider')}}">
                                {{--                                <i class="fas fa-users"></i>--}}
                                <span>Slider</span>
                            </a>
                        </li>
                        <li  class="{{\Request::is('earn-page') ? 'bgactivelink' : ''}}" style="border: 1px solid white;border-bottom: 0px">
                            <a class="{{\Request::is('earn-page') ? 'coloractivelink' : ''}}" href="{{url('earn-page')}}">
                                {{--                                <i class="fas fa-users"></i>--}}
                                <span>Earn</span>
                            </a>
                        </li>
                        <li  class="{{\Request::is('contest-page') ? 'bgactivelink' : ''}}" style="border: 1px solid white;border-bottom: 0px">
                            <a class="{{\Request::is('contest-page') ? 'coloractivelink' : ''}}" href="{{url('contest-page')}}">
                                {{--                                <i class="fas fa-users"></i>--}}
                                <span>CONTEST</span>
                            </a>
                        </li>
                        <li  class="{{\Request::is('promote-page') ? 'bgactivelink' : ''}}" style="border: 1px solid white;border-bottom: 0px">
                            <a class="{{\Request::is('promote-page') ? 'coloractivelink' : ''}}" href="{{url('promote-page')}}">
                                {{--                                <i class="fas fa-users"></i>--}}
                                <span>Promote Page</span>
                            </a>
                        </li>
                        <li  class="{{\Request::is('blog-page') ? 'bgactivelink' : ''}}" style="border: 1px solid white;border-bottom: 0px">
                            <a class="{{\Request::is('blog-page') ? 'coloractivelink' : ''}}" href="{{url('blog-page')}}">
                                {{--                                <i class="fas fa-users"></i>--}}
                                <span>Blogs</span>
                            </a>
                        </li>

                        <li class="" style="border: 1px solid white;">
                            <a href="{{ url('logout-user') }}">
{{--                                <i class="fas fa-user"></i>--}}
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
        <!-- page-content" -->
    </div>

</div>
<script>
    function logoutUser()
    {
        event.preventDefault();
        document.getElementById('logoutbtn').click();
    }
    function notification_send(pingCount) {
        if (Notification.permission !== 'granted')
            Notification.requestPermission();
        else {
            var notification = new Notification('New Messages', {
                icon: `{{asset('sms.png')}}`,
                body: pingCount + ' New Meesages',
            });
            notification.onclick = function() {
                window.open(`{{url('')}}`);
            };
        }
    }

    $(document).ready(function(){
        document.getElementById('navtopmain').style.display = 'block';

        var x = window.matchMedia("(max-width: 600px)")
        myFunction(x) // Call listener function at run time
        x.addListener(myFunction) // Attach listener function on state changes
        if (!Notification) {
            alert('Desktop notifications not available in your browser. Try Chromium.');
            return;
        }

        if (Notification.permission !== 'granted'){
            Notification.requestPermission();
        }

        getCountsFunction();

    });

    function getCountsFunction(){
        $.get(`{{url('get-chat-ping-count')}}`, function(data, status){
            let result = JSON.parse(data);
            document.getElementById('chat-count-dynamic').innerText = result.count;
            if(result.pingCount > 0){
                notification_send(result.pingCount);
            }
        });
        setTimeout(function () {
            getCountsFunction();
        }, 60000)
    }

    function myFunction(x) {
        if (x.matches) { // If media query matches
            $(".page-wrapper").removeClass("toggled");
            document.getElementById('navtopmain').style.display = 'none';
        } else {

        }
    }

    jQuery(function ($) {

        $(".sidebar-dropdown > a").click(function () {
            $(".sidebar-submenu").slideUp(200);
            if (
                $(this)
                    .parent()
                    .hasClass("active")
            ) {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .parent()
                    .removeClass("active");
            } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .next(".sidebar-submenu")
                    .slideDown(200);
                $(this)
                    .parent()
                    .addClass("active");
            }
        });

        $("#close-sidebar").click(function () {
            $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function () {
            $(".page-wrapper").addClass("toggled");
        });

    });
</script>
</body>
</html>
