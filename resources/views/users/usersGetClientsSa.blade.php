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
                    <a href="{{ url('/files/serviceagreement') }}"><i class="fa fa-file"></i>  Service Agreement</a>
                </li>
                <li class="breadcrumb-item">
                   <i class="fa fa-file"></i> {{ $clientsInfo['0']->name }}
                </li>
            </ol>

            <h5 style="margin-top:60px;color:#535763"><i class="fa fa-file"></i> 
                [SA] Service Agreement
                <br>
                <br>
                <a href="{{ url('/clients/'.$clientsInfo[0]->id.'')}}"><span style="font-size: 13px;">Client's Details <i class="fa fa-user"></i></span></a>
            </h5>
            <hr>

            <a href="{{ url('/files/serviceagreement') }}"><i class="backBtn fa fa-arrow-left" aria-hidden="true"></i></a>
            <div class="container">
                <div class="row clickImg">
                        @if($clientsInfo[0]->serviceAgreement === null)
                            <p>no file uploaded yet.</p>
                        @else
                            @foreach(explode(',', $clientsInfo[0]->serviceAgreement) as $info) 
                                <div class="col-4">
                                    <img class="fileImg" src="{{ asset('images/sa/'.$info.'') }}">
                                </div>
                            @endforeach
                        @endif
                </div>
            </div>

            <div class="fileImgModalBack"></div>
            <div class="fileImgModal">
                @foreach(explode(',', $clientsInfo[0]->serviceAgreement) as $info) 
                    <img src="{{ asset('images/sa/'.$info.'') }}">
                @endforeach    
            </div>

        </div>

    </div>
    
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $('#example').DataTable();


        $('.clickImg').click(function(){
            $(".fileImgModal").fadeIn(300);
            $(".fileImgModalBack").fadeIn(300);
        });
        $('.fileImgModalBack').click(function(){
            $(".fileImgModal").fadeOut(300);
            $(".fileImgModalBack").fadeOut(300);
        });
    });
</script>




@endsection
    

<style type="text/css">
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
    .fileImg {
        width: 100%;
        height: 100%;
        position: relative;
        padding:5px; 
        box-shadow: 0 0 4px 0 #aaa;     
        transition: .3s;     
    }
    .fileImg:hover {
        box-shadow: 0 0 7px 0 #888;  
        transition: .3s;     
    }
    .fileImgModal {
        position: absolute;
        height: 95vh;
        top:-20px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 5px;
        width: 70%;
        background: #000;
        z-index: 999;
        /*box-shadow: 0 0 10px 0 #000;*/
        padding:20px;
        overflow: scroll;
        overflow-x: hidden;
        display: none;
  }
    .fileImgModal > img {
        position: relative;
        left: 50%;
        transform: translateX(-50%);
        height: 90vh;
        max-width: 80%;
        margin-bottom: 10px;

    }
    .fileImgModalBack {
        position: fixed;
        top: 0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        background: rgba(0,0,0,.8);
        width: 100%;
        height: 100%;
        z-index: 99;
        display: none;

    }
</style>
