@extends('layouts.dashboard')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{--    <div>--}}
    <div class="container" style="max-width: 1500px;margin-top: 30px;margin-bottom: 10px">
        @if($errors->any())
            <div class="alert alert-danger">
                <h4 style="color: black;font-size: 14px">{{$errors->first()}}</h4>
            </div>
        @endif
        @if(\Illuminate\Support\Facades\Session::has('msg'))
            <div class="alert alert-success" style="margin-bottom: 0px!important;">
                <h4 style="color: black">{{\Illuminate\Support\Facades\Session::get("msg")}}</h4>
            </div>
        @endif
        <h3 style="letter-spacing: 3px;margin-top: 20px" class="mt-4 mb-3">BANNERS</h3>
        <p style="font-size: 13px;">Below is a list of all three entries.</p>

        <div class="px-5">
            <form method="post" action="{{url('savebanners')}}" enctype="multipart/form-data">
                @csrf
            <div style="border: 1px solid lightgray;padding: 20px">
                <p style="font-weight: bold">Banner 1</p>
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{url('banner-get')}}/1">
                    </div>
                    <div class="col-md-6">
                        <input type="file" name="banner1" style="display: none" id="banner1" onchange="document.getElementById('bannerform').click()">
                        <button type="button" class="btn btn-outline-success" onclick="document.getElementById('banner1').click()">Change Banner 1</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div style="margin-top: 10px">
                            <div >
                                @csrf
                                <input type="hidden" name="urlnumber" value="1">
                                <input type="text" class="form-control" name="url1" value="{{$bannersAll[0]->url ?? ''}}"  id="url" placeholder="e.g. https://facebook.com">
                                <button type="submit" id="url1form" style="display: none"></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="margin-top: 10px">
                            <button type="button" class="btn btn-success" onclick="document.getElementById('url1form').click()">UPDATE URL</button>
                        </div>
                    </div>
                </div>
            </div>

            <div style="margin-top: 30px;border: 1px solid lightgray;padding: 20px">
                <p style="font-weight: bold">Banner 2</p>
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{url('banner-get')}}/2">
                    </div>
                    <div class="col-md-6">
                        <input type="file" name="banner2" style="display: none" id="banner2"  onchange="document.getElementById('bannerform').click()">
                        <button  type="button" class="btn btn-outline-success" onclick="document.getElementById('banner2').click()">Change Banner 2</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div style="margin-top: 10px">
                            <div>
                                @csrf
                                <input type="hidden" name="urlnumber" value="2">
                                <input type="text" class="form-control" name="url2" value="{{$bannersAll[1]->url ?? ''}}"  id="url" placeholder="e.g. https://facebook.com" >
                                <button type="submit" id="url2form" style="display: none"></button>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="margin-top: 10px">
                            <button type="button" class="btn btn-success" onclick="document.getElementById('url2form').click()">UPDATE URL</button>
                        </div>
                    </div>
                </div>
            </div>

            <div style="margin-top: 30px;border: 1px solid lightgray;padding: 20px">
                <p style="font-weight: bold">Banner 3</p>
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{url('banner-get')}}/3">
                    </div>
                    <div class="col-md-6">
                        <input type="file" name="banner3" style="display: none" id="banner3"  onchange="document.getElementById('bannerform').click()">
                        <button type="button" class="btn btn-outline-success" onclick="document.getElementById('banner3').click()">Change Banner 3</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div style="margin-top: 10px">
                            <div>
                                @csrf
                                <input type="hidden" name="urlnumber" value="3">
                                <input type="text" class="form-control" name="url3" value="{{$bannersAll[2]->url ?? ''}}"  id="url" placeholder="e.g. https://facebook.com">
                                <button type="submit" id="url3form" style="display: none"></button>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="margin-top: 10px">
                            <button type="button" class="btn btn-success" onclick="document.getElementById('url3form').click()">UPDATE URL</button>
                        </div>
                    </div>
                </div>
            </div>
                <button type="submit" id="bannerform" style="display: none"></button>
            </form>



            {{-- <label onclick="switchFilters()" style="margin-left: 20px;padding:5px;background:#d3d3d385;border-radius:5px;cursor: pointer;" ><i class="fa fa-filter"></i> Filters</label> --}}

        </div>

        <div class="table-responsive">

        </div>

    </div>

    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" id="resetheading">Modal Heading</h3>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h5>Reset Password</h5>
                    <form action="{{url('set-certificate-password')}}" method="post">
                        @csrf
                        <input type="hidden" id="certificateId" name="certificateId">
                        <div>
                            <input type="text" placeholder="Password" class="form-control" name="password" required>
                        </div><br>
                        <div>
                            <input type="text"  placeholder="ConfirmPassword" class="form-control" name="conpassword" required>
                        </div><br>
                        <div>
                            <button class="btn btn-secondary">SUBMIT</button>
                        </div>
                    </form>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <script>
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

        function setName(fileId, inputId) {
            var files = document.getElementById(fileId).files;
            if (files.length > 0) {
                document.getElementById(inputId).value = files[0].name;
            }
        }

        function deleteCertificate(id) {
            if(confirm('Confirm delete this entry?')){
                document.getElementById('deletebtn'+ id).click();
            }
        }

        function resetModal(id, name) {
            document.getElementById('resetheading').innerText = name + " (ref : " + id + ")";
            document.getElementById('certificateId').value = id;
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
// Prepare the preview for profile picture
            $("#photo").change(function () {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photopreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <script>
        $(document).ready(function(){
            getFilteredData();
            $('#influencer').select2();
            $('#product').select2();
            $('#category').select2();


        });
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

        function getFilteredData(){
            let influencer = document.getElementById('influencer').value;
            let product = document.getElementById('product').value;
            let category = document.getElementById('category').value;
            let length = document.getElementById('length').value;
            let sort_influencer = document.getElementById('sort_influencer').value;
            let sort_product = document.getElementById('sort_product').value;
            let sort_type = document.getElementById('sort_type').value;
            let sort_ascending = document.getElementById('sort_ascending').value;

            let formData = new FormData();
            formData.append('influencer', influencer);
            formData.append('product', product);
            formData.append('category', category);
            formData.append('length', length);
            formData.append('sort_influencer', sort_influencer);
            formData.append('sort_product', sort_product);
            formData.append('sort_type', sort_type);
            formData.append('sort_ascending', sort_ascending);
            formData.append("_token", "{{ csrf_token() }}");
            document.getElementById('tbodyId').innerHTML = 'Filtering data...';
            $.ajax({
                url: `{{env('APP_URL')}}/search-entries-by-admin`,
                type: 'POST',
                dataType: "JSON",
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (result) {

                    if (result.status === true) {
                        console.log(result.data);
                        showData(result.data);
                        document.getElementById('show-filtered').innerText = result.data.length;
                        document.getElementById('show-total').innerText = result.entriesCount;
                        document.getElementById('show-filtered2').innerText = result.data.length;
                        document.getElementById('show-total2').innerText = result.entriesCount;

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
            for(let i=0;i<entries.length;i++){
                let tr = document.createElement('tr');
                let td1 = document.createElement('td');
                let td2 = document.createElement('td');
                let td3 = document.createElement('td');
                let td4 = document.createElement('td');
                let td5 = document.createElement('td');
                let td6 = document.createElement('td');
                let td7 = document.createElement('td');
                let td8 = document.createElement('td');
                let td9 = document.createElement('td');
                let td10 = document.createElement('td');
                let tdoptions = document.createElement('td');
                td1.innerText = i + 1;
                let img = document.createElement('img');
                img.src = `{{url('show-image')}}` + '/' + entries[i].id;
                img.style = "height: 30px;width: 30px;border-radius: 12px;";

                let info = document.createElement('a');
                info.setAttribute('href', entries[i].info);
                info.setAttribute('target', '_blank');
                let linkIcon = document.createElement('i');
                linkIcon.classList.add('fa', 'fa-link');
                linkIcon.style.fontSize = '20px';
                info.appendChild(linkIcon);
                td2.appendChild(img);
                td3.innerText = entries[i].influencer;
                td4.innerText = entries[i].product;
                td5.innerText = entries[i].product_type;
                td6.setAttribute('id', 'promo_code' + entries[i].id)
                td6.innerHTML = entries[i].promo_code;
                if(entries[i].worked !== 'N/A'){
                    let spanworked = document.createElement('span');
                    spanworked.style.color = 'green';
                    spanworked.innerHTML = entries[i].worked + '%';
                    td7.appendChild(spanworked);
                }else{
                    let spanworked = document.createElement('span');
                    spanworked.style.color = 'green';
                    spanworked.innerHTML = entries[i].worked;
                    td7.appendChild(spanworked);
                }
                if(entries[i].notwordked !== 'N/A'){
                    let spannotworked = document.createElement('span');
                    spannotworked.style.color = 'red';
                    spannotworked.innerHTML =  entries[i].notwordked + '%';
                    td8.appendChild(spannotworked);
                }else{
                    let spannotworked = document.createElement('span');
                    spannotworked.style.color = 'red';
                    spannotworked.innerHTML =  entries[i].notwordked;
                    td8.appendChild(spannotworked);
                }

                td9.innerHTML = entries[i].views;
                td10.appendChild(info);

                let editbtn = document.createElement('a');
                editbtn.classList.add('btn', 'btn-primary');
                editbtn.setAttribute('href', `{{url('/edit-entry/')}}` + '/' + entries[i].id);
                editbtn.innerText = 'EDIT';

                let deleteLink = document.createElement('a');
                deleteLink.setAttribute('href', `{{url('/delete-entry/')}}` + '/' + entries[i].id);
                deleteLink.style.display = 'none';
                deleteLink.setAttribute('id', 'deletebtn' + entries[i].id)
                let deleteButton = document.createElement('button');
                deleteButton.classList.add('btn', 'btn-danger');
                deleteButton.innerText = 'DELETE';
                deleteButton.style.marginLeft = '5px';
                deleteButton.addEventListener('click', function() {
                    deleteCertificate(entries[i].id);
                });
                tdoptions.appendChild(editbtn);
                tdoptions.appendChild(deleteLink);
                tdoptions.appendChild(deleteButton);


                tr.appendChild(td1);
                tr.appendChild(td2);
                tr.appendChild(td3);
                tr.appendChild(td4);
                tr.appendChild(td5);
                tr.appendChild(td6);
                // tr.appendChild(tdoptions);
                tr.appendChild(td7);
                tr.appendChild(td8);
                tr.appendChild(td9);
                tr.appendChild(td10);
                tr.appendChild(tdoptions);
                document.getElementById('tbodyId').appendChild(tr);
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
                        swal("Error", "You Already gave the feedbackfor this entry.");
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
                        swal("Success", "Liked");
                    }else{
                        swal("Error", "You Already gave the feedbackfor this entry.");
                    }
                    getFilteredData();

                },
                error: function (data) {


                }
            });
        }

    </script>
@endsection
