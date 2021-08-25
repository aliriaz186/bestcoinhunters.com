@extends('layouts.landing-app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{url('')}}/assets/css/works.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>

        @media screen and (max-width: 600px) {

        }




        .autocomplete-items {

            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            /*position the autocomplete items to be the same width as the container:*/
            top: 100%;
            left: 0;
            right: 0;
        }

        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #fff;
            border-bottom: 1px solid #d4d4d4;
        }

        /*when hovering an item:*/
        .autocomplete-items div:hover {
            background-color: #e9e9e9;
        }

        /*when navigating through the items using the arrow keys:*/
        .autocomplete-active {
            background-color: DodgerBlue !important;
            color: #ffffff;
        }
        .mainbanners{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            -webkit-align-items: center;
            align-items: center;
            width: 100%;
        }
        .mainbannerlink img{
            display: block;
            max-width: 85vw;
            margin-top: 1rem;
            border-radius: 1rem;
            height: 6.8rem;
            /* max-width: 900px; */
            /*width: 1000px;*/
        }
        .respmaxwidth{
            margin: 0 auto;
            max-width: 1500px;
        }
        @media screen and (max-width: 798px){
            .mainbannerlink img {
                max-width: 96vw;
                margin-top: .5rem;
                border-radius: .5rem;
                height: 2.5rem;
            }
            .imgslider{
                height: 180px!important;
            }
            .slidercont{
                max-width: 1500px!important;
            }
            .pricemargintop{
                margin-top: 10px;
            }
            .respallbtnslinks{
                margin: 0 auto;
                max-width: 250px;
            }
        }

        @media screen and (min-width: 1000px){
            .mainbannerlink img {
                margin-top: .5rem;
                border-radius: .5rem;
                height: 3rem;
            }
            .slidercont{
                max-width: 850px!important;
            }
            .tablehead{
                max-width: 800px!important;;
            }
            .respmaxwidth{
                max-width: 800px!important;;
            }
        }


        @media screen and (min-width: 1200px){
            .mainbannerlink img {
                margin-top: .5rem;
                border-radius: .5rem;
                height: 4.5rem;
            }
            .slidercont{
                max-width: 900px!important;
            }
            .tablehead{
                max-width: 850px!important;;
            }
            .respmaxwidth{
                max-width: 850px!important;;
            }
        }

        @media screen and (min-width: 1400px){
            .mainbannerlink img {
                margin-top: .5rem;
                border-radius: .5rem;
                height: 5.5rem;
            }
            .slidercont{
                max-width: 1000px!important;;
            }
            .tablehead{
                max-width: 900px!important;;
            }
            .respmaxwidth{
                max-width: 900px!important;;
            }
        }
        @media screen and (min-width: 1600px){
            .mainbannerlink img {
                margin-top: .5rem;
                border-radius: .5rem;
                height: 6rem;
            }
            .slidercont{
                max-width: 1200px!important;;
            }
            .tablehead{
                max-width: 1100px!important;;
            }
            .respmaxwidth{
                max-width: 1100px!important;;
            }
        }
        @media screen and (min-width: 1800px){
            .mainbannerlink img {
                margin-top: .5rem;
                border-radius: .5rem;
                height: 6.8rem;
            }
            .slidercont{
                max-width: 1500px!important;;
            }
            .tablehead{
                max-width: 1500px!important;;
            }
            .respmaxwidth{
                max-width: 1500px!important;;
            }
        }




        .mainslider{
            margin-top: 1rem;
            width: 80%;
            height: 11vw;
        }
        .swipecontainer{
            margin-left: auto;
            margin-right: auto;
            position: relative;
            overflow: hidden;
            list-style: none;
            padding: 0;
            z-index: 1;
        }

        @media (max-width: 767px) {
            .carousel-inner .carousel-item > div {
                display: none;
            }
            .carousel-inner .carousel-item > div:first-child {
                display: block;
            }
            .paddingcoursal{
                padding-left: 0px;padding-right: 0px;
            }
            .slidercont{
                width: 100%;
                padding-right: 0px;
                padding-left: 0px;
                margin-right: auto;
                margin-left: auto;
            }
        }

        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
        }

        /* medium and up screens */
        @media (min-width: 768px) {

            .carousel-inner .carousel-item-end.active,
            .carousel-inner .carousel-item-next {
                transform: translateX(25%);
            }

            .carousel-inner .carousel-item-start.active,
            .carousel-inner .carousel-item-prev {
                transform: translateX(-25%);
            }
        }

        .carousel-inner .carousel-item-end,
        .carousel-inner .carousel-item-start {
            transform: translateX(0);
        }
        .imgslider{
            border-radius: 2rem;
            max-width: 100%;
            height: 200px;
            height: calc(11vw - 1rem);
            /*object-fit: contain;*/
            /*margin: auto;*/
        }

        .slidercont{
            width: 100%;
            padding-right: var(--bs-gutter-x,.75rem);
            padding-left: var(--bs-gutter-x,.75rem);
            margin-right: auto;
            margin-left: auto;
            /*margin: 0 auto;*/
            max-width: 1500px;
        }

        .tablehead{
            color: #fff;
            border-radius: 2rem;
            min-width: 80vw;
            overflow: hidden;
            background-color: #e9f0f8;
            max-width: 1500px;
            margin: 0 auto;
        }

        .tablecoins{
            width: 100%;
            max-width: 100vw;
            border-collapse: collapse;
            border-radius: 2rem;
        }

        .trclass{
            height: 4rem;
            cursor: pointer;
            background-color: #e9f0f8;
            color: #000;
        }

        .tdclass{
            min-width: 10rem;
            max-width: 20%;
            width: 17%;
            text-align: center;
            border-top: 1px solid rgba(0,0,0,.05);
            white-space: nowrap;
        }

        .customupvotebtn{
            height: 3.5rem;
            min-width: 6.5rem;
            cursor: pointer;
            color: #28a745;
            border: 1px solid #28a745;
            border-radius: .5rem;
            background: #e9f0f8;
        }

        .customupvotebtn1{
            height: 5rem;
            min-width: 15rem;
            cursor: pointer;
            font-size: 2rem;
            color: #28a745;
            border: 1px solid #28a745;
            border-radius: .5rem;
            background: #181d23;
        }

        .customupvotebtn:hover{
            background: #28a745;
            color: white;
        }
        .customupvotebtn1:hover{
            background: #28a745;
            color: white;
        }

        .seemorebtn{
            width: 100%;
            height: 4.2rem;
            color: #6e5eeb;
            background-color: #e9f0f8;
            cursor: pointer;
            display: -webkit-flex;
            display: flex;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-align-items: center;
            align-items: center;
            font-weight: 600;
            font-size: 14px;
            border-top: 1px solid rgba(0,0,0,.05);
        }

        @media screen and (max-width: 600px) {
            .smallscreenoff{
                display: none;
            }

            .resppaddingclass{
                padding: 2px!important;
            }
            .respmarginclass {
                margin-left: 0px!important;
            }
        }

        .resppaddingclass{
            padding: 10px;
        }
        .respmarginclass{
            margin-left: 5px;
        }

        .divlogoclass{
            width: 100%;
            margin-left: 15%;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: row;
            flex-direction: row;
            -webkit-justify-content: flex-start;
            justify-content: flex-start;
            -webkit-align-items: center;
            align-items: center;
            text-align: left;
            text-overflow: ellipsis;
            font-weight: bold;
        }

        .divlogoimg{
            margin-right: 1rem;
            height: 3rem;
            width: 3rem;
            -webkit-flex-shrink: 0;
            flex-shrink: 0;
            object-fit: cover;
            border-radius: 1rem;
        }

        .searchcustom{
            height: calc(2.4rem + 3vh);
            background-color: inherit;
            color: #fff;
            padding-left: 2rem;
            font-size: 1.8rem;
            width: 25rem;
            border-radius: 1rem;
            outline: none;
            border: none;
        }

        .mainviewseach{
            background-color: #181d23;
            height: 100%;
            border-radius: 1rem;
            padding-left: 2rem;
            display: -webkit-flex;
            display: flex;
            -webkit-align-items: center;
            align-items: center;
        }


        .input-box-custom2:focus, .input-box-custom2m:active, .input-box-custom2:hover{
            outline: 2px solid #9488f0;
        }

        .righttext{
            color: #888cab;
            margin-left: 2rem;
            font-weight: 600;
            font-size: 1.7rem;
            text-align: right;
            -webkit-flex-grow: 1;
            flex-grow: 1;
            white-space: nowrap;
            padding-right: 2rem;
        }

        .divinfirstrow{
            height: 10rem;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: row;
            flex-direction: row;
            margin-bottom: 2rem;
        }

        .inimg{
            height: 4rem;
            width: 4rem;
            margin-right: 2rem;
        }
        .inh2{
            font-weight: 200;
            font-size: 2.8rem;
            margin: 0;
            white-space: nowrap;
        }
        .indiv2{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: row;
            flex-direction: row;
        }

        .inspan{
            background-color: #9488f0;
            height: 4.6rem;
            line-height: 4.6rem;
            padding: 0 1rem;
            font-size: 2.4rem;
            border-radius: 1rem;
            display: -webkit-inline-flex;
            display: inline-flex;
            white-space: nowrap;
            font-weight: 600;
        }

        .indiv3{
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: row;
            flex-direction: row;
            -webkit-align-items: center;
            align-items: center;
            width: 80%;
            margin-left: 2rem;
        }

        .indiv4{
            display: -webkit-flex;
            display: flex;
            margin-right: 2rem;
            height: 4.6rem;
            line-height: 4.6rem;
            padding: 0 1rem;
            background-color: #232a32;
            border-radius: 1rem;
            font-size: 2.2rem;
            font-weight: 600;
        }

        .invotes{
            margin-right: 1rem;
            font-size: 1.4rem;
            font-weight: 300;
        }

        .intoday{
            display: -webkit-flex;
            display: flex;
            margin-right: 2rem;
            height: 4.6rem;
            line-height: 4.6rem;
            padding: 0 1rem;
            background-color: #232a32;
            border-radius: 1rem;
            font-size: 2.2rem;
            font-weight: 600;
        }

        .spantoday{
            margin-right: 1rem;
            font-size: 1.4rem;
            font-weight: 300;
        }

        .inlink{
            border: 1px solid #9488f0;
            margin-bottom: 5px;
            border-radius: .5rem;
            padding: 0.5rem;
             width: 220px!important;
            text-align: center;
            color: white;
            padding-left: 15px;
            padding-right: 15px;
            background: #232a32;
        }
        .inlink:hover{
            background: #9488f0;
            color: white;
        }
        .line1{
            -webkit-flex-direction: row;
            flex-direction: row;
            -webkit-align-items: center;
            align-items: center;
        }

        .line1span{
            font-size: 1.8rem;
            display: -webkit-inline-flex;
            display: inline-flex;
            -webkit-justify-content: left;
            justify-content: left;
            -webkit-flex-shrink: 1;
            flex-shrink: 1;
            width: 100%;
            white-space: nowrap;
        }


    </style>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <?php
    $bannerAll = \App\Models\Banner::all();
    ?>
    <section  style="padding-top: 2px;">
        {{--        <div class="banner__bg"></div>--}}
        <div class="mainbanners">
            <a class="mainbannerlink" target="_blank"   href="{{$bannerAll[0]->url}}">
                <img src="{{url('banner-get')}}/1" alt="banner" loading="lazy">
            </a>
            <a class="mainbannerlink" target="_blank"   href="{{$bannerAll[1]->url}}">
                <img src="{{url('banner-get')}}/2" alt="banner" loading="lazy">
            </a>
            <a class="mainbannerlink" target="_blank"   href="{{$bannerAll[2]->url}}">
                <img src="{{url('banner-get')}}/3" alt="banner" loading="lazy">
            </a>
        </div>

        <div class="slidercont text-center mt-3">
            <div class="row mx-auto my-auto justify-content-center">
                <div id="recipeCarousel" class="carousel slide paddingcoursal" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        @foreach(\App\Models\Slide::all() as $key => $slide)
                            <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                <div class="col-md-4" style="margin-left: 8px!important;margin-right: 8px!important;">
                                    <div class="card" style="background: none">
                                        <div class="card-img" >
                                            <img src="{{url('slide-get')}}/{{$slide->id}}" class="imgslider" loading="lazy"  onclick="window.open(`{{$slide->url}}`)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a style="display: none" class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a style="display: none" class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>

        <div class="resppaddingclass respmaxwidth">
{{--            <div class="container" style="margin-bottom: 20px;max-width: 1500px">--}}
{{--                <a href="{{url('')}}" style="color: white;font-size: 15px"><img style="height: 1.6rem; margin-right: 1rem" src="{{url('goback.svg')}}"> Back To Main</a>--}}
{{--            </div>--}}
            <div id="add-coin-form" action="{{url('save-coin')}}" method="post"  onsubmit="return saveCoin()">
                @csrf
                <div style="background: #181d23;padding: 3rem;border-radius: 2rem;color: white;margin: 0 auto;max-width: 1500px">
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-md-8" style="margin-top: 20px;">
                            <div class="d-flex flex-wrap">
                                <div style=";margin-top: 10px">
                                    <picture>
                                        <img class="inimg" src="{{$coin->logo}}">
                                    </picture>
                                </div>
                                <div style=";margin-top: 10px">
                                    <h2 class="inh2" style="color: white;font-size: 22px;text-transform: capitalize!important;margin-bottom: 10px">{{$coin->name}}</h2>
                                    <div class="d-flex flex-wrap">
                                        <div style="padding: 10px;background-color: #9488f0;border-radius: 1rem;width: 150px;text-align: center;margin-top: 10px" class="respmarginclass">
                                            <span style="font-size: 16px;font-weight: bold;color: white;;text-align: center">{{$coin->symbol}}</span>
                                        </div>
                                        <div style="padding: 10px;background-color: #232a32;border-radius: 1rem;width: 150px;text-align: center;margin-top: 10px" class="respmarginclass">
                                            <span style="font-size: 13px;color: white;text-align: center">Votes</span>
                                            <span style="margin-left: 5px;font-size: 16px;font-weight: bold;color: white;text-align: center">{{$coin->upvotes}}</span>
                                        </div>
                                        <div style="padding: 10px;background-color: #232a32;border-radius: 1rem;width: 150px;text-align: center;margin-top: 10px" class="respmarginclass">
                                            <span style="font-size: 13px;color: white;text-align: center">Today</span>
                                            <span style="margin-left: 5px;font-size: 16px;font-weight: bold;color: white;text-align: center">{{$coin->upvotes}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 25px;margin-bottom: 25px">
                                <span style="background: #465160;padding: 8px;border-radius: 5px;font-size: 16px;text-align: center">Binance Smart Chain: {{$coin->address}}</span>
                            </div>
                            <div class="row resppaddingclass" style="border-top: 1px solid #9488f0;border-bottom: 1px solid #9488f0;">
                                <div class="col-md-4 pricemargintop">
                                    <span style="margin-left: 0.5rem">Market cap:</span>
                                    <span style="margin-left: 0.5rem;font-weight: bold;font-size: 14px">${{$coin->market_cap}}</span>
                                </div>
                                <div class="col-md-4 pricemargintop">
                                    <span style="margin-left: 0.5rem">Price:</span>
                                    <span style="margin-left: 0.5rem;font-weight: bold;font-size: 14px">${{$coin->price}}</span>
                                </div>
                                <div class="col-md-4 pricemargintop">
                                    <span style="margin-left: 0.5rem">Launch:</span>
                                    <span style="margin-left: 0.5rem;font-weight: bold;font-size: 14px">{{$coin->launch_date}}</span>
                                </div>

                            </div>
                            <p style="margin-top: 25px;color: #a1a5aa">
                                {!! $coin->description  !!}
                            </p>
                        </div>
                        <div class="col-md-3 respallbtnslinks" style="margin-top: 20px;">
                            <div style="width: 250px">
                                <button class="inlink" href="{{$coin->website}}" target="_blank" rel="noopener noreferrer nofollow">Visit Website</button>
                            </div>
                            <div style="margin-top: 5px;width: 250px">
                                <button class="inlink" href="{{$coin->telegram}}" target="_blank" rel="noopener noreferrer nofollow">Join Telegram</button>
                            </div>
                            <div style="margin-top: 5px;width: 250px">
                                <button class="inlink" href="{{$coin->twitter}}" target="_blank" rel="noopener noreferrer nofollow">Follow Twitter</button>
                            </div>
                            <div style="margin-top: 5px;width: 250px">
                                <button class="inlink" href="{{$coin->discord}}" target="_blank" rel="noopener noreferrer nofollow">Join Discord</button>
                            </div>
                        </div>
                    </div>
                    <div style="margin: 0 auto;margin-top: 50px;max-width: 250px">
                        @if($upVoted == 1)
                            <button id="upvtebtn-{{$coin->id}}" class="customupvotebtn1" style="background: #28a745;color: white"><span style="margin-right: 1rem">🚀</span><span>VOTED</span></button>

                        @else
                            <button id="upvtebtn-{{$coin->id}}" class="customupvotebtn1"  onclick="upvoteCoin2(`{{$coin->id}}`, `{{$coin->upvotes}}`)"><span style="margin-right: 1rem">🚀</span><span>VOTE</span></button>

                        @endif

                    </div>
                    <p style="margin-top: 20px;color: #a1a5aa;text-align: center">
                        You can vote once every 24 hours
                    </p>
{{--                    <h3 style="color: white;text-align: center;margin-top: 20px">{{$earn->heading}}</h3>--}}
{{--                    <p style="color: white;text-align: center;margin-top: 25px">{{$earn->text1}}</p>--}}
{{--                    <p style="color: white;text-align: center;margin-top: 25px">{{$earn->text2}}</p>--}}
{{--                    <h5 style="color: white;text-align: center;margin-top: 25px">{{$earn->footer}}</h5>--}}
{{--                    <div style="margin: 0 auto;max-width: 250px;margin-top: 50px">--}}
{{--                        <img src="{{url('logo.png')}}">--}}
{{--                    </div>--}}
                </div>
            </div>


        </div>

        <div class="tablehead mt-4">
            <table class="tablecoins">
                <thead style="height: 3.5rem;
    background-color: #181d23;">
                <tr style="background-color: #0b0b0b;color: white">
                    <th class="text-center">💎 Promoted coins</th>
                    <th class="text-center smallscreenoff">Symbol</th>
                    <th class="text-center smallscreenoff">Market Cap</th>
                    <th class="text-center smallscreenoff">Launch</th>
                    <th class="text-center">Upvotes</th>
                </tr>
                </thead>
                <tbody>
                @foreach($promoted as $coinIn)
                    <tr class="trclass" >
                        <td class="tdclass" onclick="window.location.href = `{{env('APP_URL')}}/coin/{{$coinIn->id}}`">
                            <div class="divlogoclass" >
                                <picture>
                                    <img src="{{$coinIn->logo}}" class="divlogoimg">
                                </picture>
                                {{$coinIn->name}}
                            </div>
                        </td>
                        <td class="tdclass smallscreenoff" onclick="window.location.href = `{{env('APP_URL')}}/coin/{{$coinIn->id}}`">
                            {{$coinIn->symbol}}
                        </td>
                        <td class="tdclass smallscreenoff" onclick="window.location.href = `{{env('APP_URL')}}/coin/{{$coinIn->id}}`">
                            @if(!empty($coinIn->market_cap))
                                {{$coinIn->market_cap}}
                            @else
                                -
                            @endif
                        </td>
                        <td class="tdclass smallscreenoff" onclick="window.location.href = `{{env('APP_URL')}}/coin/{{$coinIn->id}}`">
                            {{$coinIn->launch_date}}
                        </td>
                        <td class="tdclass">
                            @if($coinIn->isUpvoted == 0)
                                <button id="upvote-btn{{$coinIn->id}}" class="customupvotebtn" onclick="upvoteCoin(`{{$coinIn->id}}`, `{{$coinIn->upvotes}}`)"><span style="margin-right: 1rem">🚀</span><span id="upvote-{{$coinIn->id}}">{{$coinIn->upvotes}}</span></button>
                            @else
                                <button class="customupvotebtn" style="background: #28a745;color: white"><span style="margin-right: 1rem">🚀</span><span>{{$coinIn->upvotes}}</span></button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>




        <div class="mainslider">
            <div class="swipecontainer">

            </div>
        </div>



        <!-- The Modal -->


    </section>

    <script>

        $(document).ready(function(){
            let items = document.querySelectorAll('.carousel .carousel-item')

            items.forEach((el) => {
                const minPerSlide = 4
                let next = el.nextElementSibling
                for (var i=1; i<minPerSlide; i++) {
                    if (!next) {
                        // wrap carousel by using first child
                        next = items[0]
                    }
                    let cloneChild = next.cloneNode(true)
                    el.appendChild(cloneChild.children[0])
                    next = next.nextElementSibling
                }
            })


        });

        function upvoteCoin(id, number){
            document.getElementById('upvote-btn' + id).style.background = '#28a745';
            document.getElementById('upvote-btn' + id).style.color = 'white';
            number = parseInt(number) + 1;
            document.getElementById('upvote-' + id).innerText = number;
            upvote(id);
        }

        function upvoteCoin2(id, number){
            document.getElementById('upvtebtn-' + id).style.background = '#28a745';
            document.getElementById('upvtebtn-' + id).style.color = 'white';
            document.getElementById('upvtebtn-' + id).innerHTML = "<span style='margin-right: 1rem'>🚀</span><span>VOTED</span>";
            upvote(id);
        }



        function upvote(id){
            let formData = new FormData();
            formData.append('id', id);
            formData.append('useragent',  navigator.userAgent);

            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: `{{env('APP_URL')}}/upvote`,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (result) {

                    if (result.status === true) {
                        //    console.log(result.data);


                    } else {

                    }
                },
                error: function (data) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "server Error",
                    });
                }
            });
        }

    </script>
@endsection
