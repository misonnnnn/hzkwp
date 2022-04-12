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
                    <i class="fa fa-file"></i>  Service Agreement
                </li>
            </ol>

            <h5 style="margin-top:60px;color:#535763"><i class="fa fa-file"></i> 
                [SA] Service Agreement
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
                    <div class="col-sm-3">
                        <a href="{{ url('files/serviceagreement/'.$cordata->clientId) }}"><div class="file-div">
                            <p class="folder_name">{{ $cordata->clientName }}</p>
                            <hr>
                            <p class="fileCount">Handled by {{ $cordata->usersName }}</p>
                            <div class="folder">
                                @if(is_null($cordata->serviceAgreement))
                                    <div class="fileEmpty">
                                        <img src="{{ asset('resources/empty.png') }}">
                                    </div>
                                @else 
                                    <div class="fileInside"></div>
                                @endif
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
                            if (item['serviceAgreement'] === null) {
                                fileInside = '<div class="fileEmpty">'
                                                    +'<img src="{{ asset("resources/empty.png") }}">'
                                            +'</div>';
                            }else{
                                fileInside = '<div class="fileInside"></div>';
                            }
                          html +=  '<div class="col-sm-3">'
                                    +'<a href="#"><div class="file-div">'
                                      +'<p class="folder_name">' + item['clientName'] + '</p>'
                                      +'<hr>'
                                      +'<p class="fileCount">Handled by ' + item['usersName'] +  '</p>'
                                      +'<div class="folder">' + fileInside
                                      +'</div>'
                                    +'</div></a>'
                                  +'</div>';
                            fileInside = "";

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


   
   
    .folder {
        width: 150px;
        height: 105px;
        margin: 0 auto;
        top: 58%;
        transform: translateY(-50%);
        position: relative;
        background-color: #566472;
        border-radius: 0 6px 6px 6px;
        /*box-shadow: 4px 4px 7px rgba(0, 0, 0, 0.59);*/
        box-shadow: 3px 3px 5px 0px #aaa;
    }

    .folder:before {
        content: '';
        width: 100%;
        height: 80%;
        border-radius: 5px 5px 0 0;
        background-color: #708090;
        position: absolute;
        z-index: 999;
        bottom:0px;
        transform: skew(-15deg);
        left: 15px;

    }

    .folder:after {
        content: '';
        width: 50%;
        height: 10px;
        border-radius: 5px 5px 0 0;
        background-color: #566472;
        position: absolute;
        top: -8px;
        left: 0px;

    }
    .fileInside {
        margin-top: 10px;
        height: 80px;
        width: 90%;
        box-shadow: -1px 1px 5px #aaa;
        position: absolute;
        background: #eee;
        margin-left: -10px;

    }

    .fileEmpty {
        width: 100px;
        height: 100px;
        position: absolute;
        margin-left: -40px;
        margin-top: -20px;z-index: 999;

    }
    .fileEmpty img {
        position: absolute;
        width: 100%;
        height: 100%;
    }
    .file-div{
        /*height: 200px;
        width: 100%;
        background: #ddd;
        border-radius: 5px;
        box-shadow: 1px 1px 3px 0 #aaa;
        margin-top: 10px;*/
        height: 200px;
        width: 100%;
        /*border:solid #aaa 1px;*/
        margin:15px;
        box-shadow:  0 0 3px 0 #aaa;
        overflow: hidden;
        position: relative;
    }

     .file-div:hover {
        background: #efefef;
    }

    .folder_name {
        margin:5px;
        padding:0px;
        float: left;
        text-indent: 10px;
        white-space: nowrap;
        font-size: 15px;
        overflow: hidden;
        text-overflow: ellipsis;
        
    }
    .file-div > hr {
        float: left;
        height: 1px;
        width: 100%;
        margin-top: 0px;
        width: 100%;
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

    .fileCount {
        position: absolute;
        bottom:-12px;
        font-size:13px;
        text-align: right;
        padding:0px 10px;
        width: 100%;
        border-top: 1px solid #ddd;
    }
    
</style>
