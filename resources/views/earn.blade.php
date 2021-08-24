@extends('layouts.landing-app')
@section('content')
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}

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
            max-width: 80vw;
            margin-top: 1rem;
            border-radius: 1rem;
        }
        @media screen and (max-width: 798px){
            .mainbannerlink img {
                max-width: 98vw;
                margin-top: .5rem;
                border-radius: .5rem;
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
            /*height: calc(11vw - 1rem);*/
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

        .input-box-custom{
            background-color: #232a32;
            border-radius: .3rem;
            padding: .4rem 1rem;
            width: 100%;
            color: #fff;
            font-size: 1.4rem;
            outline: none;
            border: none;
        }

        .input-box-custom-textarea{
            background-color: #232a32;
            border-radius: .3rem;
            padding: .4rem 1rem;
            width: 100%;
            color: #fff;
            font-size: 1.4rem;
            outline: none;
            border: none;
            height: 150px;
        }

        .input-box-custom:focus, .input-box-custom:active, .input-box-custom:hover{
            outline: 2px solid #9488f0;
        }

        .input-box-custom-textarea:focus, .input-box-custom-textarea:active, .input-box-custom-textarea:hover{
            outline: 2px solid #9488f0;
        }

        .add-coin-btn{
            color: #fff;
            border: 1px solid #9488f0;
            background-color: #232a32;
            padding: 1rem 2vw;
            border-radius: 1rem;
            font-size: 2.4rem;
            cursor: pointer;
        }
        .add-coin-btn:hover{
            color: #fff;
            background-color: #9488f0;
        }
        @media screen and (max-width: 600px) {


            .resppaddingclass{
                padding: 2px!important;
            }
            .resppaddingclass2{
                padding: 1rem!important;
            }
            .respmarginclass {
                margin-left: 0px!important;
            }
            .add-coin-btn{
                font-size: 1rem!important;
            }
        }

        .resppaddingclass{
            padding: 30px;
        }

        .resppaddingclass2{
            padding: 3rem
        }

    </style>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <section  style="padding-top: 2px;">
        {{--        <div class="banner__bg"></div>--}}
        <div class="container resppaddingclass">
            <div style="margin-bottom: 20px">
                <a href="{{url('')}}" style="color: white;font-size: 15px"><img style="height: 1.6rem; margin-right: 1rem" src="{{url('goback.svg')}}"> Back To Main</a>
            </div>
            <form id="add-coin-form" action="{{url('save-coin')}}" method="post"  onsubmit="return saveCoin()">
                @csrf
                <div class="resppaddingclass2" style="background: #181d23;border-radius: 2rem;color: white;margin: 0 auto;max-width: 900px">
                    <h3 style="color: white;text-align: center;margin-top: 20px">{{$earn->heading}}</h3>
                    <p style="color: white;text-align: center;margin-top: 25px">{{$earn->text1}}</p>
                    <p style="color: white;text-align: center;margin-top: 25px">{{$earn->text2}}</p>
                    <h5 style="color: white;text-align: center;margin-top: 25px">{{$earn->footer}}</h5>
                    <div style="margin: 0 auto;max-width: 250px;margin-top: 50px">
                        <img src="{{url('logo.png')}}">
                    </div>
                </div>
            </form>


        </div>




        <!-- The Modal -->
        {{--        <div class="modal" id="myModal">--}}
        {{--            <div class="modal-dialog">--}}
        {{--                <div class="modal-content">--}}

        {{--                    <!-- Modal Header -->--}}
        {{--                    <div class="modal-header">--}}
        {{--                        <h4 class="modal-title">Promo Code</h4>--}}
        {{--                        <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
        {{--                    </div>--}}

        {{--                    <!-- Modal body -->--}}
        {{--                    <div class="modal-body">--}}
        {{--                        <h1 id="PromoCodeDiv"></h1>--}}
        {{--                    </div>--}}

        {{--                    <!-- Modal footer -->--}}
        {{--                    <div class="modal-footer">--}}
        {{--                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>--}}
        {{--                    </div>--}}

        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
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
            // getFilteredData();
            // $('#influencer').select2();
            // $('#product').select2();
            // $('#category').select2();
            // document.getElementById('previousbtn').setAttribute('disabled', true);


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
                getFilteredData();
            }, 1000);
            return true;
        }

        let openIds = [];
        let start = 0;
        let end = 5;


        document.getElementById("#myFormId").addEventListener("submit", function(e){
            if(!isValid){
                e.preventDefault();    //stop form from submitting
            }else {
                saveCoin();
                e.preventDefault();
            }
            //do whatever an submit the form
        });

        function saveCoin(){

            let name = document.getElementById('name').value;
            let symbol = document.getElementById('symbol').value;
            let description = document.getElementById('description').value;
            let marketCap = document.getElementById('marketCap').value;
            let price = document.getElementById('price').value;
            let launchDate = document.getElementById('launchDate').value;
            let chain = document.getElementById('chain').value;
            let address = document.getElementById('address').value;
            let website = document.getElementById('website').value;
            let telegram = document.getElementById('telegram').value;
            let twitter = document.getElementById('twitter').value;
            let discord = document.getElementById('discord').value;
            let reddit = document.getElementById('reddit').value;
            let logo = document.getElementById('logo').value;
            let email = document.getElementById('email').value;
            let contactTelegram = document.getElementById('contactTelegram').value;
            let formData = new FormData();
            formData.append('name', name);
            formData.append('symbol', symbol);
            formData.append('description', description);
            formData.append('marketCap', marketCap);
            formData.append('price', price);
            formData.append('launchDate', launchDate);
            formData.append('chain', chain);
            formData.append('address', address);
            formData.append('website', website);
            formData.append('telegram', telegram);
            formData.append('twitter', twitter);
            formData.append('discord', discord);
            formData.append('reddit', reddit);
            formData.append('logo', logo);
            formData.append('email', email);
            formData.append('contactTelegram', contactTelegram);
            formData.append("_token", "{{ csrf_token() }}");

            $.ajax({
                url: `{{env('APP_URL')}}/save-coin`,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (result) {

                    if (result.status === true) {
                        swal({
                            title: "Thank you! Your coin will be added ASAP 🚀",
                            text: "We do not ask our users to register or complete captcha for every vote. However, we monitor activity manually, and in case a token is caught getting a lot of botted votes, we will enable captcha and/or other restrictions.  Please note, if your coin stays inactive for a long while, it may get delisted.",
                            icon: "success",
                            button: "Got it",
                        }).then((value) => {
                            document.getElementById('homepage').click()
                        });


                    } else {
                        swal({
                            icon: 'error',
                            title: 'Oops...',
                            text: result.message,
                        });
                        // swal({
                        //     title: "Good job!",
                        //     text: "You clicked the button!",
                        //     icon: "success",
                        //     button: "Aww yiss!",
                        // });
                    }
                    return false;
                },
                error: function (data) {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "server Error",
                    });
                    return false;
                }
            });
            return false;
        }

        function getFilteredData(statt = null){
            let influencer = document.getElementById('influencer').value;
            let product = document.getElementById('product').value;
            let category = document.getElementById('category').value;
            let length = document.getElementById('length').value;
            let sort_influencer = document.getElementById('sort_influencer').value;
            let sort_product = document.getElementById('sort_product').value;
            let sort_type = document.getElementById('sort_type').value;
            let sort_ascending = document.getElementById('sort_ascending').value;

            if(statt === 2){
                start = start + parseInt(length);
                end = start +  parseInt(length);
            }
            if(statt === 1){
                start = start - parseInt(length);
                end = end -  parseInt(length);
            }

            if(statt === null){
                start = 0;
                end = parseInt(length);
            }
            if(start === 0){
                document.getElementById('previousbtn').setAttribute('disabled', true);
            }else{
                document.getElementById('previousbtn').removeAttribute('disabled', true);
            }


            let formData = new FormData();
            formData.append('influencer', influencer);
            formData.append('product', product);
            formData.append('category', category);
            formData.append('length', length);
            formData.append('sort_influencer', sort_influencer);
            formData.append('sort_product', sort_product);
            formData.append('sort_type', sort_type);
            formData.append('sort_ascending', sort_ascending);
            formData.append('start', start);
            formData.append("_token", "{{ csrf_token() }}");
            document.getElementById('tbodyId').innerHTML = 'Filtering data...';
            $.ajax({
                url: `{{env('APP_URL')}}/search-entries`,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (result) {

                    if (result.status === true) {

                        openIds = [];
                        showData(result.data);
                        document.getElementById('show-filtered').innerText = result.data.length;
                        document.getElementById('show-total').innerText = result.entriesCount;
                        if(result.entriesCount < end){
                            end = result.entriesCount;
                        }
                        document.getElementById('show-filtered2').innerText = (start+1) + ' - ' +end;
                        document.getElementById('show-total2').innerText = result.entriesCount;

                        if(end >= result.entriesCount){
                            document.getElementById('nextbtn').setAttribute('disabled', true);
                        }else{
                            document.getElementById('nextbtn').removeAttribute('disabled', true);
                        }

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: result.message,
                        });
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

        function showData(entries){
            document.getElementById('tbodyId').innerHTML = '';
            let indexing = start;
            for(let i=0;i<entries.length;i++){
                indexing++;
                let tr = document.createElement('tr');
                let td1 = document.createElement('td');
                let td2 = document.createElement('td');
                let td3 = document.createElement('td');
                let td4 = document.createElement('td');
                let td5 = document.createElement('td');
                let td6 = document.createElement('td');
                let td7 = document.createElement('td');
                let td8 = document.createElement('td');
                let tdoptions = document.createElement('td');
                td1.innerText = indexing;
                let img = document.createElement('img');
                img.src = `{{url('show-image')}}` + '/' + entries[i].id;
                img.style = "height: 30px;width: 30px;border-radius: 12px;";

                let promobutton = document.createElement('button');
                promobutton.setAttribute('type', 'button');
                promobutton.classList.add('btn', 'btn-primary');
                promobutton.innerText = "Get Code";
                promobutton.addEventListener("click", function() {
                    document.getElementById('promo_code' + entries[i].id).innerText = entries[i].promo_code;
                    getCodeApi(entries[i].id);
                });

                let info = document.createElement('a');
                info.setAttribute('href', entries[i].info);
                info.setAttribute('target', '_blank');
                let linkIcon = document.createElement('i');
                linkIcon.classList.add('fa', 'fa-link');
                linkIcon.style.fontSize = '20px';
                info.appendChild(linkIcon);
                td2.appendChild(img);
                if(entries[i].haveManyProducts === 1){
                    let linkInf = document.createElement('a');
                    linkInf.innerText = entries[i].influencer;
                    linkInf.style.color = 'blue';
                    linkInf.style.cursor = 'pointer';
                    linkInf.style.textDecoration = 'underline';
                    entries[i].cliked = false;
                    openIds.push(entries[i].id);
                    linkInf.addEventListener("click", function() {

                        for(let l=0;l<openIds.length;l++){
                            let alltrinners = document.getElementsByName('trinner' + openIds[l]);
                            for(let k=0;k<alltrinners.length;k++){
                                alltrinners[k].style.display = 'none';
                            }

                        }
                        console.log(entries[i].cliked);
                        if(entries[i].cliked === false){
                            let alltrinners = document.getElementsByName('trinner' + entries[i].id);
                            for(let k=0;k<alltrinners.length;k++){
                                alltrinners[k].style.display = 'table-row';
                            }
                            entries[i].cliked = true;
                        }else{
                            let alltrinners = document.getElementsByName('trinner' + entries[i].id);
                            for(let k=0;k<alltrinners.length;k++){
                                alltrinners[k].style.display = 'none';
                            }
                            entries[i].cliked = false;
                        }

                    });
                    td3.appendChild(linkInf);

                }else{
                    td3.innerText = entries[i].influencer;
                }
                // td3.innerText = entries[i].influencer;
                td4.innerText = entries[i].product;
                td5.innerText = entries[i].product_type;
                td6.setAttribute('id', 'promo_code' + entries[i].id)
                td6.appendChild(promobutton);
                if(entries[i].worked !== 'N/A'){
                    td7.innerText =  entries[i].worked + '%';
                }else{
                    td7.innerText =  entries[i].worked;
                }
                // if(entries[i].notwordked !== 'N/A'){
                //     td8.innerText =  entries[i].notwordked + '%';
                // }else{
                //     td8.innerText =  entries[i].notwordked;
                // }
                td8.appendChild(info);
                let likebtn = document.createElement('i');
                likebtn.classList.add('fa', 'fa-thumbs-up');
                likebtn.style.cursor = 'pointer';
                likebtn.style.color = 'green';
                likebtn.style.fontSize = '25px';
                likebtn.setAttribute('title', 'Worked');
                likebtn.addEventListener('click', function() {
                    likebtnFunc(entries[i].id);
                });

                let unlikebtn = document.createElement('i');
                unlikebtn.classList.add('fa', 'fa-thumbs-down');
                unlikebtn.addEventListener('click', function() {
                    unlikebtnFunc(entries[i].id);
                });
                unlikebtn.style.marginLeft = '10px';
                unlikebtn.style.cursor = 'pointer';
                unlikebtn.style.color = 'red';
                unlikebtn.style.fontSize = '25px';
                unlikebtn.setAttribute('title', 'Not Worked');
                tdoptions.appendChild(likebtn);
                tdoptions.appendChild(unlikebtn);


                tr.appendChild(td1);
                tr.appendChild(td2);
                tr.appendChild(td3);
                tr.appendChild(td4);
                tr.appendChild(td5);
                tr.appendChild(td6);
                tr.appendChild(tdoptions);
                tr.appendChild(td7);
                tr.appendChild(td8);
                document.getElementById('tbodyId').appendChild(tr);


                if(entries[i].haveManyProducts === 1){
                    let alphabet = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
                    let alphaCount = 0;
                    for(let j=0;j<entries[i].products.length;j++){
                        if(j === 0){
                            alphaCount = 0;
                            continue;
                        }
                        let trinner = document.createElement('tr');
                        trinner.style.background = 'lightgrey';
                        trinner.setAttribute('name', 'trinner' + entries[i].id);
                        trinner.style.display = 'none';
                        let td1inner = document.createElement('td');
                        let td2inner = document.createElement('td');
                        let td3inner = document.createElement('td');
                        let td4inner = document.createElement('td');
                        let td5inner = document.createElement('td');
                        let td6inner = document.createElement('td');
                        let td7inner = document.createElement('td');
                        let td8inner = document.createElement('td');
                        let tdoptionsinner = document.createElement('td');
                        td1inner.innerText = indexing + alphabet[alphaCount];
                        alphaCount++;



                        let img = document.createElement('img');
                        img.src = `{{url('show-image')}}` + '/' + entries[i].products[j].id;
                        img.style = "height: 30px;width: 30px;border-radius: 12px;";
                        td2inner.appendChild(img);
                        td3inner.innerText = entries[i].products[j].influencer;


                        let promobutton = document.createElement('button');
                        promobutton.setAttribute('type', 'button');
                        promobutton.classList.add('btn', 'btn-primary');
                        promobutton.innerText = "Get Code";
                        promobutton.addEventListener("click", function() {
                            document.getElementById('promo_code' + entries[i].products[j].id).innerText = entries[i].products[j].promo_code;
                            getCodeApi(entries[i].products[j].id);
                        });

                        let info = document.createElement('a');
                        info.setAttribute('href', entries[i].products[j].info);
                        info.setAttribute('target', '_blank');
                        let linkIcon = document.createElement('i');
                        linkIcon.classList.add('fa', 'fa-link');
                        linkIcon.style.fontSize = '20px';
                        info.appendChild(linkIcon);

                        td4inner.innerText = entries[i].products[j].product;
                        td5inner.innerText = entries[i].products[j].product_type;
                        td6inner.setAttribute('id', 'promo_code' + entries[i].products[j].id)
                        td6inner.appendChild(promobutton);
                        if(entries[i].products[j].worked !== 'N/A'){
                            td7inner.innerText =  entries[i].products[j].worked + '%';
                        }else{
                            td7inner.innerText =  entries[i].products[j].worked;
                        }

                        td8inner.appendChild(info);

                        let likebtn = document.createElement('i');
                        likebtn.classList.add('fa', 'fa-thumbs-up');
                        likebtn.style.cursor = 'pointer';
                        likebtn.style.color = 'green';
                        likebtn.style.fontSize = '25px';
                        likebtn.setAttribute('title', 'Worked');
                        likebtn.addEventListener('click', function() {
                            likebtnFunc(entries[i].products[j].id);
                        });

                        let unlikebtn = document.createElement('i');
                        unlikebtn.classList.add('fa', 'fa-thumbs-down');
                        unlikebtn.addEventListener('click', function() {
                            unlikebtnFunc(entries[i].products[j].id);
                        });
                        unlikebtn.style.marginLeft = '10px';
                        unlikebtn.style.cursor = 'pointer';
                        unlikebtn.style.color = 'red';
                        unlikebtn.style.fontSize = '25px';
                        unlikebtn.setAttribute('title', 'Not Worked');
                        tdoptionsinner.appendChild(likebtn);
                        tdoptionsinner.appendChild(unlikebtn);



                        trinner.appendChild(td1inner);
                        trinner.appendChild(td2inner);
                        trinner.appendChild(td3inner);
                        trinner.appendChild(td4inner);
                        trinner.appendChild(td5inner);
                        trinner.appendChild(td6inner);
                        trinner.appendChild(tdoptionsinner);
                        trinner.appendChild(td7inner);
                        trinner.appendChild(td8inner);

                        document.getElementById('tbodyId').appendChild(trinner);
                    }

                }
            }
        }

        function getCodeApi(id){
            let formData = new FormData();
            formData.append('id', id);
            formData.append('useragent',  navigator.userAgent);

            formData.append("_token", "{{ csrf_token() }}");
            $.ajax({
                url: `{{env('APP_URL')}}/code-get`,
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
