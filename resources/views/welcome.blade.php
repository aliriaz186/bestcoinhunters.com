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
            @media screen and (max-width: 798px){
                .mainbannerlink img {
                    max-width: 96vw;
                    margin-top: .5rem;
                    border-radius: .5rem;
                    height: 2.5rem;
                }
                .slidercont{
                    max-width: 1500px!important;
                }
                .imgslider{
                    height: 180px!important;
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
                .tablehead2{
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
                .tablehead2{
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
                .tablehead2{
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
                .tablehead2{
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
                .tablehead2{
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
            height: 180px;
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
            height: 3rem;
            min-width: 6.5rem;
            cursor: pointer;
            color: #28a745;
            border: 1px solid #28a745;
            border-radius: .5rem;
            background: #e9f0f8;
        }

        .customupvotebtn:hover{
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
            height: 3.5rem;
            background-color: #181d23;
            color: #fff;
            padding-left: 2rem;
            font-size: 1rem;
            width: 20rem;
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

        .btnsimplecustom{
            padding: 5px;
            font-size: 15px;
            border-radius: 1rem;
            text-align: center;
            height: 3.5rem;
            background-color: #181d23;
            color: #fff;
            /* width: 50rem; */
            outline: none;
            font-weight: bold;
            border: 1px solid #9488f0;

        }

        .btnsimplecustom2{
            padding: 5px;
            font-size: 15px;
            border-radius: 1rem;
            text-align: center;
            height: 3.5rem;
            background-color: #696c84;
            color: #fff;
            /* width: 50rem; */
            outline: none;
            font-weight: bold;
            border: 1px solid #9488f0;
        }
        .btnsimplecustom:hover{
           color: white;
            background-color: #696c84;
        }
        .btnsimplecustom2:hover{
           color: white;
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
            <a class="mainbannerlink" target="_blank"  href="{{$bannerAll[0]->url}}">
                <img src="{{url('banner-get')}}/1" alt="banner" class="lazyclass" loading="lazy">
            </a>
            <a class="mainbannerlink" target="_blank"  href="{{$bannerAll[1]->url}}">
                <img src="{{url('banner-get')}}/2" alt="banner" class="lazyclass" loading="lazy">
            </a>
            <a class="mainbannerlink" target="_blank"  href="{{$bannerAll[2]->url}}">
                <img src="{{url('banner-get')}}/3" alt="banner" class="lazyclass" loading="lazy">
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
                                        <img src="{{url('slide-get')}}/{{$slide->id}}" class="imgslider lazyclass" loading="lazy" onclick="window.open(`{{$slide->url}}`)">
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

    <div class="tablehead mt-4" style="max-width: 1500px;margin: 0 auto">
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
            @foreach($promoted as $coin)
                <tr class="trclass">
                    <td class="tdclass" onclick="window.location.href = `{{env('APP_URL')}}/coin/{{$coin->id}}`">
                        <div class="divlogoclass">
                            <picture>
                                <img src="{{$coin->logo}}" class="divlogoimg">
                            </picture>
                            {{$coin->name}}
                        </div>
                    </td>
                    <td class="tdclass smallscreenoff" onclick="window.location.href = `{{env('APP_URL')}}/coin/{{$coin->id}}`">
                        {{$coin->symbol}}
                    </td>
                    <td class="tdclass smallscreenoff" onclick="window.location.href = `{{env('APP_URL')}}/coin/{{$coin->id}}`">
                        @if(!empty($coin->market_cap))
                            {{$coin->market_cap}}
                        @else
                            -
                        @endif
                    </td>
                    <td class="tdclass smallscreenoff" onclick="window.location.href = `{{env('APP_URL')}}/coin/{{$coin->id}}`">
                        {{$coin->launch_date}}
                    </td>
                    <td class="tdclass">
                        @if($coin->isUpvoted == 0)
                            <button id="upvote-btn{{$coin->id}}" class="customupvotebtn" onclick="upvoteCoin(`{{$coin->id}}`, `{{$coin->upvotes}}`)"><span style="margin-right: 1rem">🚀</span><span id="upvote-{{$coin->id}}">{{$coin->upvotes}}</span></button>
                        @else
                            <button class="customupvotebtn" style="background: #28a745;color: white"><span style="margin-right: 1rem">🚀</span><span>{{$coin->upvotes}}</span></button>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>




    <div class="tablehead2 d-flex flex-wrap" style="max-width: 1500px;margin: 0 auto;margin-top: 30px">
        <div style="margin-left: 10px;margin-top: 10px">
            <button onclick="todayHot()" id="todayhot" class="btn btnsimplecustom2" style="width: 170px">🔥 Today's Hot</button>
        </div>
        <div style="margin-left: 10px;;margin-top: 10px">
            <button onclick="newHot()" id="newhot"  class="btn btnsimplecustom" style="width: 130px;">💙 New</button>
        </div>
        <div style="margin-left: 10px;;margin-top: 10px">
            <input type="text" id="searchcustom" class="searchcustom" name="search" placeholder="Search.." style="width: 200px">
        </div>

{{--        <div class="mainviewseach input-box-custom2" style="margin-top: 50px;width: 350px">--}}
{{--            <input type="text" id="searchcustom" class="searchcustom" name="search" placeholder="Search.." style="width: 200px">--}}
{{--        </div>--}}
{{--        <div class="righttext">--}}
{{--            Coins can be upvoted every 24h--}}
{{--        </div>--}}
    </div>
    <div class="tablehead mt-2">
        <table class="tablecoins">
            <thead style="height: 3.5rem;
    background-color: #181d23;">
                <tr style="background-color: #0b0b0b;color: white">
                    <th class="text-center">Asset</th>
                    <th class="text-center smallscreenoff">Symbol</th>
                    <th class="text-center smallscreenoff">Market Cap</th>
                    <th class="text-center smallscreenoff">Launch</th>
                    <th class="text-center">Upvotes</th>
                </tr>
            </thead>
            <tbody id="tbodyId">
{{--                <tr class="trclass">--}}
{{--                    <td class="tdclass">--}}
{{--                        <img src="">--}}
{{--                        --}}
{{--                    </td>--}}
{{--                </tr>--}}
            </tbody>
        </table>
        <div class="seemorebtn" id="loadergif"><img src="{{url('loader.gif')}}" style="height: 100px"></div>
        <button class="seemorebtn"  onclick="getFilteredData()"><img src="{{url('downarrow.svg')}}" style="    margin-right: 7px;
    height: 11px;"> See More</button>
    </div>

        <div class="mainslider">
            <div class="swipecontainer">

            </div>
        </div>



          <!-- The Modal -->
          <div class="modal" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Promo Code</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                 <h1 id="PromoCodeDiv"></h1>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

              </div>
            </div>
          </div>

    </section>

    <script>







        function delay(callback, ms) {
            var timer = 0;
            return function() {
                var context = this, args = arguments;
                clearTimeout(timer);
                timer = setTimeout(function () {
                    callback.apply(context, args);
                }, ms || 0);
            };
        }

        function todayHot(){
           document.getElementById('todayhot').style.background = '#696c84';
           document.getElementById('newhot').style.background = '#181d23';
            document.getElementById('tbodyId').innerHTML = '';
            resetLimit();
            getFilteredData();
        }

        function newHot(){
            document.getElementById('todayhot').style.background = '#181d23';
            document.getElementById('newhot').style.background = '#696c84';
            document.getElementById('tbodyId').innerHTML = '';
            resetLimit();
            getFilteredData(-5);
        }


        // document.addEventListener("DOMContentLoaded", function() {
        //     alert('contentloaded')
        // });

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


             getFilteredData();

            $('#searchcustom').keyup(delay(function (e) {
                document.getElementById('tbodyId').innerHTML = '';
                getFilteredData(this.value);
            }, 500));
            // $('#influencer').select2();
            // $('#product').select2();
            // $('#category').select2();
            // document.getElementById('previousbtn').setAttribute('disabled', true);

            // var lazyloadImages = document.querySelectorAll("img.lazyclass");
            // setTimeout(function (){
            //     lazyloadImages.forEach(function (img) {
            //         img.src = img.dataset.src;
            //     });
            // },500);

        });

        function sortAsc(){
            resetSort();
            document.getElementById('ascending').style.display = 'none';
            document.getElementById('decending').style.display = 'inline';
            document.getElementById('sort_ascending').value = 0;
            getFilteredData();
        }

        function sortDesc(){
            resetSort();
            document.getElementById('ascending').style.display = 'inline';
            document.getElementById('decending').style.display = 'none';
            document.getElementById('sort_ascending').value = 1;
            getFilteredData();
        }

        let switchF = false;
        let influencerSort = 0;
        let productSort = 0;
        let typeSort = 0;
        function setSortInfluencer(type){
            if(influencerSort === 0){
                resetSort();
                document.getElementById(type).value = 1;
                document.getElementById('sort_influencer' + '1').classList.remove('fa-chevron-down');
                document.getElementById(type + '1').classList.add('fa-chevron-up');
                influencerSort = 1;
            }else{
                resetSort();
                document.getElementById(type).value = 0;
                influencerSort = 0;
            }

            getFilteredData();

        }

        function setSortProduct(type){
            if(productSort === 0){
                resetSort();
                document.getElementById(type).value = 1;
                document.getElementById('sort_product' + '1').classList.remove('fa-chevron-down');
                document.getElementById(type + '1').classList.add('fa-chevron-up');
                productSort = 1;
            }else{
                resetSort();
                document.getElementById(type).value = 0;
                productSort = 0;
            }

            getFilteredData();

        }

        function setSortType(type){
            if(typeSort === 0){
                resetSort();
                document.getElementById(type).value = 1;

                document.getElementById('sort_type' + '1').classList.remove('fa-chevron-down');
                document.getElementById(type + '1').classList.add('fa-chevron-up');
                typeSort = 1;
            }else{
                resetSort();
                document.getElementById(type).value = 0;
                typeSort = 0;
            }

            getFilteredData();

        }

        function resetSort(){
            document.getElementById('sort_influencer' + '1').classList.remove('fa-chevron-up');
            document.getElementById('sort_product' + '1').classList.remove('fa-chevron-up');
            document.getElementById('sort_type' + '1').classList.remove('fa-chevron-up');
            document.getElementById('sort_influencer' + '1').classList.remove('fa-chevron-down');
            document.getElementById('sort_product' + '1').classList.remove('fa-chevron-down');
            document.getElementById('sort_type' + '1').classList.remove('fa-chevron-down');

            document.getElementById('sort_influencer' + '1').classList.add('fa-chevron-down');
            document.getElementById('sort_product' + '1').classList.add('fa-chevron-down');
            document.getElementById('sort_type' + '1').classList.add('fa-chevron-down');

            document.getElementById('sort_influencer').value = 0;
            document.getElementById('sort_product').value = 0;
            document.getElementById('sort_type').value = 0;

            influencerSort = 0;
            productSort = 0;
            typeSort = 0;
        }

        function switchFilters(){
            if(switchF == false){
                document.getElementById('filtersdiv').style.display = 'block';
                switchF = true;
            }
            else if(switchF == true){
                document.getElementById('filtersdiv').style.display = 'none';
                switchF = false;
            }

        }
        let typingTimer;
        function searchInfoOnKeyDown(){
            clearTimeout(typingTimer);
            typingTimer = setTimeout(function () {
                // getFilteredData(-2);
            }, 1000);
            return true;
        }
        let limit = 3;
        let offsetValue = -3;

        function resetLimit(){
            limit = 3;
            offsetValue = -3;
        }

        function getFilteredData(statt = -1){

            // let influencer = document.getElementById('influencer').value;
            // let product = document.getElementById('product').value;
            // let category = document.getElementById('category').value;
            // let length = document.getElementById('length').value;
            // let sort_influencer = document.getElementById('sort_influencer').value;
            // let sort_product = document.getElementById('sort_product').value;
            // let sort_type = document.getElementById('sort_type').value;
            // let sort_ascending = document.getElementById('sort_ascending').value;
            if (statt !== -1){
               resetLimit();
            }
            offsetValue = offsetValue + limit;
            let formData = new FormData();
            formData.append('limit', limit);
            formData.append('offset', offsetValue);
            formData.append('useragent',  navigator.userAgent);
            formData.append('search',  statt);


            {{--formData.append('product', product);--}}
            {{--formData.append('category', category);--}}
            {{--formData.append('length', length);--}}
            {{--formData.append('sort_influencer', sort_influencer);--}}
            {{--formData.append('sort_product', sort_product);--}}
            {{--formData.append('sort_type', sort_type);--}}
            {{--formData.append('sort_ascending', sort_ascending);--}}
            {{--formData.append('start', start);--}}
            formData.append("_token", "{{ csrf_token() }}");
            document.getElementById('loadergif').style.display = 'flex';
            $.ajax({
                url: `{{env('APP_URL')}}/search-coins`,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (result) {
                    document.getElementById('loadergif').style.display = 'none';

                    if (result.status === true) {
                        console.log(result.data);
                       showData(result.data);


                    } else {
                        swal({
                            icon: 'error',
                            title: 'Oops...',
                            text: result.message,
                        });
                    }
                },
                error: function (data) {
                    document.getElementById('loadergif').style.display = 'none';

                    swal({
                        icon: 'error',
                        title: 'Oops...',
                        text: "server Error",
                    });
                }
            });
        }

        function upvoteCoin(id, number){
            document.getElementById('upvote-btn' + id).style.background = '#28a745';
            document.getElementById('upvote-btn' + id).style.color = 'white';
            number = parseInt(number) + 1;
            document.getElementById('upvote-' + id).innerText = number;
            upvote(id);
        }

        function showData(entries){
            // document.getElementById('tbodyId').innerHTML = '';
            for(let i=0;i<entries.length;i++){
                let tr = document.createElement('tr');
                let td1 = document.createElement('td');
                let td2 = document.createElement('td');
                let td3 = document.createElement('td');
                let td4 = document.createElement('td');
                let td5 = document.createElement('td');
                let img = document.createElement('img');
                tr.classList.add('trclass');
                td1.classList.add('tdclass');
                td2.classList.add('tdclass', 'smallscreenoff');
                td3.classList.add('tdclass', 'smallscreenoff');
                td4.classList.add('tdclass', 'smallscreenoff');
                td5.classList.add('tdclass');
                img.src = entries[i].logo;
                // img.style = "height: 50px;width: 50px;border-radius: 12px;";
                img.classList.add('divlogoimg');
                let div = document.createElement('div');
                div.innerHTML = '';
                div.classList.add('divlogoclass');
                let picture = document.createElement('picture');
                picture.appendChild(img)
                div.appendChild(picture);
                // let nameSpan = document.createElement('span');
                // nameSpan.innerText = entries[i].name;
                // nameSpan.style.fontWeight = 'bold';
                // nameSpan.style.marginLeft = '15px';
                div.append(entries[i].name)
                td1.appendChild(div);


                td2.innerHTML = entries[i].symbol;

                if (entries[i].market_cap === ''){
                    td3.innerHTML = '-';
                }else{
                    td3.innerHTML = entries[i].market_cap;
                }
                td4.innerHTML = entries[i].launch_date;

                let upvotebutton = document.createElement('button');
                upvotebutton.setAttribute('type', 'button');
                upvotebutton.classList.add('customupvotebtn');
                if (entries[i].isUpvoted === 1){
                    upvotebutton.style.background = '#28a745';
                    upvotebutton.style.color = 'white';
                }
                td1.addEventListener("click", function() {
                    window.location.href = `{{env('APP_URL')}}/coin/${entries[i].id}`;
                });
                td2.addEventListener("click", function() {
                    window.location.href = `{{env('APP_URL')}}/coin/${entries[i].id}`;
                });
                td3.addEventListener("click", function() {
                    window.location.href = `{{env('APP_URL')}}/coin/${entries[i].id}`;
                });
                td4.addEventListener("click", function() {
                    window.location.href = `{{env('APP_URL')}}/coin/${entries[i].id}`;
                });

                upvotebutton.addEventListener("click", function() {
                    if (entries[i].isUpvoted === 0){
                        upvotebutton.style.background = '#28a745';
                        upvotebutton.style.color = 'white';
                        entries[i].upvotes = parseInt(entries[i].upvotes) + 1;
                        upvotebutton.removeChild(upvotebutton.lastChild);
                        upvotebutton.append(entries[i].upvotes);
                        upvote(entries[i].id);
                        entries[i].isUpvoted = 1;
                    }
                });

                let upvotespan = document.createElement('span');
                upvotespan.innerHTML = "🚀";
                upvotespan.style.marginRight = '1rem';
                upvotebutton.appendChild(upvotespan);
                let spancount = document.createElement('span');
                spancount.innerText = entries[i].upvotes;
                upvotebutton.append(spancount);

                td5.appendChild(upvotebutton)


                tr.appendChild(td1);
                tr.appendChild(td2);
                tr.appendChild(td3);
                tr.appendChild(td4);
                tr.appendChild(td5);
                document.getElementById('tbodyId').appendChild(tr);
            }
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

        function likebtnFunc(id){

            let formData = new FormData();
            formData.append('status', 'liked');
            formData.append('id', id);
            formData.append('useragent',  navigator.userAgent);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: `{{env('APP_URL')}}/like-btn`,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (result) {
                    if(result === true){
                        swal("Success", "Liked");
                    }else{
                        swal("Warning", "You already Liked this entry");
                    }

                    getFilteredData();
                },
                error: function (data) {


                }
            });
        }

        function unlikebtnFunc(id){


            let formData = new FormData();
            formData.append('status', 'unliked');
            formData.append('id', id);
            formData.append('useragent',  navigator.userAgent);
            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: `{{env('APP_URL')}}/unlike-btn`,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (result) {
                    if(result === true){
                        swal("Success", "UnLiked");
                    }else{
                        swal("Warning", "You Already Unliked this entry.");
                    }
                    getFilteredData();

                },
                error: function (data) {


                }
            });
        }

    </script>
@endsection
