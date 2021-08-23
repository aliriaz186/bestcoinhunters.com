<!doctype html>
<html lang="en">


<!-- Mirrored from appscred.com/html/saasly/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Apr 2021 10:48:32 GMT -->
<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!--====== Title ======-->
    <title>{{env('APP_NAME')}}</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{url('')}}/assets/images/logo.png" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{url('')}}/assets/css/bootstrap.min.css">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{url('')}}/assets/css/font-awesome.min.css">

    <!--====== magnific popup css ======-->
    <link rel="stylesheet" href="{{url('')}}/assets/css/magnific-popup.css">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{url('')}}/assets/css/slick.css">

    <!--====== animation css ======-->
    <link rel="stylesheet" href="{{url('')}}/assets/css/animate.min.css">

    <!--====== custom animation css ======-->
    <link rel="stylesheet" href="{{url('')}}/assets/css/custom-animation.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{url('')}}/assets/css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{url('')}}/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--====== jquery js ======-->
    <script src="{{url('')}}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{url('')}}/assets/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{url('')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{url('')}}/assets/js/popper.min.js"></script>

    <!--====== magnific popup js ======-->
    <script src="{{url('')}}/assets/js/jquery.magnific-popup.min.js"></script>

    <!--====== wow js ======-->
    <script src="{{url('')}}/assets/js/wow.js"></script>

    <!--====== Slick js ======-->
    <script src="{{url('')}}/assets/js/slick.min.js"></script>

    <!--====== counterup js ======-->
    <script src="{{url('')}}/assets/js/jquery.counterup.min.js"></script>
    <script src="{{url('')}}/assets/js/waypoints.min.js"></script>

    <!--====== Main js ======-->
    <script src="{{url('')}}/assets/js/main.js"></script>
    <script type="text/javascript" src="https://cdn.ywxi.net/js/1.js" async></script>
    <style>
        .blackcolorlink {
            color: black !important;
        }

        .activenavlink {
            border-bottom: 2px solid;
        }

        hr.new5 {
            border: 2px solid #6b9ce8;
            /*border-radius: 5px;*/
        }

        .facustom {
            padding: 10px;
            font-size: 20px;
            width: 40px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
            border-radius: 50%;
        }

        .facustom:hover {
            opacity: 0.7;
            color: white;
        }

        .fa-facebook {
            background: #3B5998;
            color: white;
        }

        .fa-patreon {
            background: #f96854;
            color: white;
        }

        .fa-instagram {
            background: #3f729b;
            color: white;
        }

        .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        /*Cookie Consent Begin*/
        #cookieConsent {
            background-color: rgba(20,20,20,0.8);
            min-height: 26px;
            font-size: 14px;
            color: #ccc;
            line-height: 26px;
            padding: 20px;
            font-family: "Trebuchet MS",Helvetica,sans-serif;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            display: none;
            z-index: 9999;
        }
        #cookieConsent a {
            color: #4B8EE7;
            text-decoration: none;
        }
        #closeCookieConsent {
            float: right;
            display: inline-block;
            cursor: pointer;
            height: 20px;
            width: 20px;
            margin: -15px 0 0 0;
            font-weight: bold;
        }
        #closeCookieConsent:hover {
            color: #FFF;
        }
        #cookieConsent a.cookieConsentOK {
            background-color: #6b9ce8;
            color: white;
            display: inline-block;
            border-radius: 5px;
            padding: 0 20px;
            cursor: pointer;
            float: right;
            margin: 0 60px 0 10px;
        }
        #cookieConsent a.cookieConsentOK:hover {
            background-color: #6b9ce8;
        }
        /*Cookie Consent End*/

        .dropdown:hover .dropdown-menu{
            display: block;
        }
        .dropdown-menu{
            margin-top: 0;
        }
        .onlyonmobile{
            display: none;
        }
        .ftlinksresp{
            margin-top: 140px!important;
            max-width: 180px;
        }

        .ftlinksresp2{
            margin-top: 120px;
        }

        .ftlinksresp3{
            padding: 2px;
        }

        @media screen and (max-width: 600px) {
            .onlyonmobile{
                display: inline;
            }
            .ftlinksresp{
                margin-top: 10px!important;
                max-width: 389px;
            }
            .ftlinksresp2{
                margin-top: 10px;
            }
            .ftlinksresp3{
                padding: 2px;
               padding-left: 53px;
            }
            .mgleft5{
                margin-left: 50px;
            }
            .mgtop5{
                margin-top: 30px;
            }
        }
        @media screen and (max-width: 450px) {
            .ftlinksresp{
                margin-top: 10px!important;
                max-width: 200px;
            }
        }

        .btnsimple{
            background: #232a32;
            color: white!important;
            font-size: 14px;
            /*white-space: nowrap;*/
            /*height: 4rem;*/
            /*line-height: 4rem;*/
            /*font-size: 1.4rem;*/
            border-radius: 1rem;
            padding: 10px;
            /*width: 110px;*/
            /*min-width: 12rem;*/
            text-align: center;
        }
        .btnsimple2{
            background: #9488f0;
            color: white!important;
            font-size: 14px;
            border-radius: 1rem;
            padding: 10px;
            text-align: center;
        }

        .btnsimple3{
            background: #232a32;
            color: white!important;
            font-size: 14px;
            border-radius: 1rem;
            padding: 10px;
            text-align: center;
            border: 1px solid #9488f0;
        }

        .btnicon{
            background: #9488f0;
            color: white!important;
            font-size: 14px;
        }
        .btnsimple:hover{
            background: #9488f0!important;
        }
        .btnsimple3:hover{
            background: #9488f0!important;
        }
        .mainfooter{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: row;
            flex-direction: row;
            padding: 0 10vw 5rem;
            -webkit-justify-content: space-between;
            justify-content: space-between;
        }
        .footerinner{
            margin-top: 3rem;
            -webkit-flex-direction: column;
            flex-direction: column;
            color: #7b7f84;
            padding-bottom: 4rem;
            margin: 0 auto;
            max-width: 500px;
            text-align: center;
        }
        .footermaintext{
            color: #fff;
            margin-top: 0;
            margin-bottom: 5px;
        }
        .footerlinks{
            color: #7b7e7b;
        }
        .footerlinks2{
            color: #7b7e7b;
        }
        .footerlinks:hover{
            color: white;
        }
    </style>

</head>

<body style="background: #192C38">

<div class="preloader" id="preloader">
    <div class="three ">
        <div class="loader" id="loader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light" style="background: #181d23!important;padding-inline-start: 60px">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('')}}"><img src="{{url('logo.png')}}" ></a>
        <button style="background: white!important;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            </ul>
            <div class="d-flex">
                <ul class="navbar-nav mr-auto" style="margin-top: 0px">
                    <li class="nav-item" style="margin-left: 20px">
                        <a href="#"><img src="{{url('telegram.svg')}}" style="width: 35px;height: 35px"></a>
                        <a href="#"><img src="{{url('twitter.svg')}}" style="width: 35px;height: 35px;margin-left: 10px"></a>
                    </li>
                    <li class="nav-item" style="margin-left: 20px">
                        <a class="btn btnsimple3 my-2 my-sm-0" style="width: 120px" href="{{url('addcoin')}}">Add a Coin</a>
                    </li>
                    <li class="nav-item" style="margin-left: 20px">
                        <a class="btn btnsimple2 my-2 my-sm-0" style="width: 100px" href="{{url('contest')}}">Contest</a>
                    </li>
                    <li class="nav-item" style="margin-left: 20px">
                        <a class="btn btnsimple my-2 my-sm-0" style="width: 180px" href="{{url('promote-stats')}}">Promote | Traffic Stats</a>
                    </li>
                    <li class="nav-item" style="margin-right: 20px;margin-left: 20px">
                        <a class="btn btnsimple my-2 my-sm-0" href="{{url('earn')}}" style="width: 130px">Earn With Us</a>
                    </li>
                    <li class="nav-item" style="margin-right: 20px;margin-left: 20px">
                        <a class="btn btnsimple my-2 my-sm-0" href="{{url('blog')}}" style="width: 130px">Blog</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>


<!--====== HEADER PART ENDS ======-->
@yield('content')
<!--====== FOOTER PART START ======-->

<footer class="mainfooter">
    <div class="footerinner">
        <img src="{{url('logo.png')}}" alt="">
        <h4 class="footermaintext mt-4"><a href="#" style="text-decoration: none;color: inherit">Need to boost your marketing?</a></h4>
        <div class="mt-3">
                <a href="#"><img src="{{url('telegram.svg')}}" style="width: 35px;height: 35px"></a>
                <a href="#"><img src="{{url('twitter.svg')}}" style="width: 35px;height: 35px;margin-left: 10px"></a>

        </div>
       <div class="mt-3">
           <a href="#" style="margin-left: 10px" class="footerlinks">Disclaimer</a>
           <a href="#" style="margin-left: 10px" class="footerlinks">Privacy Policy</a>
           <a href="#" style="margin-left: 10px" class="footerlinks">Terms &amp; Conditions</a>
       </div>

        <div class="footerlinks2 mt-3">BestCoinHunters © 2021 - contact@bestcoinhunters.com</div>
    </div>
</footer>




<!--====== FOOTER PART ENDS ======-->

<!--====== BACK TO TOP START ======-->

<a class="back-to-top" style="display: none;opacity: 0">
    <i class="fal fa-angle-up"></i>
</a>

<!--====== BACK TO TOP ENDS ======-->


</body>


</html>

