@extends('users.usersMasterLayout')

@section('content')

    <div class="container-fluid mainContentOuter">
        <div class="mainContent">
            <div class="sidebarToggleBtn">
                <span class="x1"></span>
                <span class="x2"></span>
                <span class="x3"></span>
            </div>

            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <i class="fa fa-home"></i> 
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/files') }}"><i class="fa fa-file"></i> Clients Files</a>
                </li>
                <li class="breadcrumb-item">
                    <i class="fa fa-user"></i>  COR
                </li>
            </ol>

            <h5 style="margin-top:60px;color:#535763"><i class="fa fa-file"></i> 
                [COR] Certificate of Registration
                <div class="searchCorDiv">
                    <i class="fa fa-search"></i>
                    <input class="searchCor" type="search" placeholder="search here">
                </div>
            </h5>
            <hr>

            <a href="{{ url('/files') }}"><i class="backBtn fa fa-arrow-left" aria-hidden="true"></i></a>

            <div class="container">
                <div class="row frontCor">
                    @foreach ($cor as $cordata)
                    <div class="col-2">

                        <a href="{{ url('images/cor/'.$cordata->cor.'') }}" target="_BLANK"><div class="corImgDiv">
                            @if ($cordata->cor != "")
                                @if(file_exists('images/cor/'.$cordata->cor)) 
                                    <img class="corImg" src="{{ asset('images/cor/'.$cordata->cor.'') }}">
                                @else
                                <span class="noFile"><i class="fa fa-file"></i> no file uploaded</span>
                                @endif  
                            @else
                                <span class="noFile"><i class="fa fa-file"></i> no file uploaded</span>
                            @endif
                            <div class="corImgDetails">
                                <span>{{ $cordata->name }}</span>
                            </div>
                        </div></a>
                    </div>
                    @endforeach
                </div>
                <div id="searchResults" class="row"></div>
            </div>
        </div>

    </div>
    
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $('#example').DataTable();
    });
</script>


<script type="text/javascript">
   $(document).ready(function(){
        $(".searchCor").keyup(function(){
            $("#searchResults").html('<p>loading <i class="fas fa-circle-notch fa-spin"></i></p>');

            $(".frontCor").remove();
             $.ajax({
                type: "get",
                url: "/searchCor",
                data: {
                    _token: "{{ csrf_token() }}",
                    searchCor: $(".searchCor").val(),
                   
                },success:function(response){
                    if (response === undefined || response.length == 0) {
                        $("#searchResults").html('<p>no results found. Try firstname, surname, or even tin number. It might work!</p>');
                    }else{
                        html = "";
                        const search = response;
                        search.forEach(myFunction);
                        $("#searchResults").html(html);

                        function myFunction(item) {
                          html +=   '<div class="col-2">'
                                        +'<a href="{!! url("images/cor/'+item['cor']+'") !!}" target="_BLANK"><div class="corImgDiv">'
                                            +'<img class="corImg" src="{!! asset("images/cor/'+item['cor']+'") !!}">'
                                            +'<div class="corImgDetails">'
                                                +'<span>' + item['name'] + '</span>'
                                            +'</div>'
                                        +'</div>'
                                    +'</div>'; 
                        }
                    }
                    
                },error:function(response){
                    alert(JSON.stringify(response));
                }
            });
        });
   });
</script>


@endsection
    

<style type="text/css">
    .searchCorDiv {
        float: right;
        padding:5px;
        margin-top: -10px;
        box-shadow: 0 0 3px 0 #aaa;
    }
    .searchCor{
        padding:3px;
        border:none;
        outline:none;
        font-size: 15px;
    }


    .corImgDiv {
        background: #ddd;
        width: 100%;
        min-width: 180px;
        min-height: 230px;
        position: relative;
        margin-bottom:20px;
        border-radius: 3px;
        transition: .3s;

    }
    .corImgDiv:hover {
        background: #aaa;   
        transition: .3s;
    }
    .corImg{
        position: absolute;
        width: 100%;
        height: 100%;
        padding:5px 10px;
    }
    .corImgDetails{
        position: absolute;
        bottom: 0px;
        left: 0px;
        right: 0px;
        height: 50px;   
        background: rgba(0,0,0,.5);
        width: 100%;

    }
    .corImgDetails > span {
        font-size: 13px;
        text-align: center;
        width: 100%;
        float: left;
        padding:5px;
        color:#fff;
    }
    .noFile {
        font-size: 13px;
        color:#444;
        position: absolute;
        top:50%;
        transform: translateY(-50%);
        width: 100%;
        text-align: center;
    }

    .backBtn {
        position: absolute;
        padding:10px;
        background: #eee;
        box-shadow: 0 0 2px 0 #aaa;
        border-radius: 50px;
        transition: .3s;

    }
    .backBtn:hover {
        box-shadow: 1px 1px 1px 0px #aaa;
        transition: .3s;
    }
</style>
