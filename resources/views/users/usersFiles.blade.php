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
                    <i class="fa fa-file"></i> Client Files
                </li>
            </ol>

            <h5 style="margin-top:60px;color:#535763"><i class="fa fa-file"></i> 
                Client Files
            </h5>
            <hr>
            <div class="container containerDiv">
                <div class="row rowDiv">
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <a href="{{url('files/cor')}}"><div class="file-div">
                            <p class="folder_name">COR</p>
                            <hr>
                            <p class="fileCount">{{ count($countCor) }} item</p>
                            <div class="folder"></div>
                        </div></a>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <a href="{{url('files/serviceagreement')}}"><div class="file-div">
                            <p class="folder_name">Service Agreement</p>
                            <hr>
                            <p class="fileCount">{{ count($countSa) }} item</p>
                            <div class="folder"></div>
                        </div></a>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="file-div">
                            <p class="folder_name">SOA</p>
                            <hr>
                            <p class="fileCount">{{ count($countCor) }} item</p>
                            <div class="folder"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="file-div">
                            <p class="folder_name">ITR</p>
                            <hr>
                            <p class="fileCount">{{ count($countCor) }} item</p>
                            <div class="folder"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="file-div">
                            <p class="folder_name">Business Permit</p>
                            <hr>
                            <p class="fileCount">{{ count($countCor) }} item</p>
                            <div class="folder"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="file-div">
                            <p class="folder_name">SEC Articles</p>
                            <hr>
                            <p class="fileCount">{{ count($countCor) }} item</p>
                            <div class="folder"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="file-div">
                            <p class="folder_name">GIS</p>
                            <hr>
                            <p class="fileCount">{{ count($countCor) }} item</p>
                            <div class="folder"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="file-div">
                            <p class="folder_name">DTI</p>
                            <hr>
                            <p class="fileCount">{{ count($countCor) }} item</p>
                            <div class="folder"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="file-div">
                            <p class="folder_name">Contract of Lease</p>
                            <hr>
                            <p class="fileCount">{{ count($countCor) }} item</p>
                            <div class="folder"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="file-div">
                            <p class="folder_name">Clients Valid ID's (sole prop.)</p>
                            <hr>
                            <p class="fileCount">{{ count($countCor) }} item</p>
                            <div class="folder"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="file-div">
                            <p class="folder_name">Clients Valid ID's (partnership.)</p>
                            <hr>
                            <p class="fileCount">{{ count($countCor) }} item</p>
                            <div class="folder"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="file-div">
                            <p class="folder_name">Stock holder Valid ID's</p>
                            <hr>
                            <p class="fileCount">{{ count($countCor) }} item</p>
                            <div class="folder"></div>
                        </div>
                    </div>
                    



                </div>
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





<style type="text/css">
    .containerDiv {
         overflow: scroll;
          overflow-x: hidden;
    }
    .rowDiv {
        position: relative;
        padding-right: 20px;
        height: 95vh;
        margin-top: -220px;
        padding-top: 220px;
    }

    .containerDiv::-webkit-scrollbar {
      width: 3px;
    }
    .containerDiv::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    .containerDiv::-webkit-scrollbar-thumb {
      background: #888;
    }

    .containerDiv::-webkit-scrollbar-thumb:hover {
      background: #555;
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

    .folder {
        width: 150px;
        height: 105px;
        margin: 0 auto;
        top: 58%;
        transform: translateY(-50%);
        position: relative;
        background-color: #708090;
        border-radius: 0 6px 6px 6px;
        /*box-shadow: 4px 4px 7px rgba(0, 0, 0, 0.59);*/
        box-shadow: 3px 3px 5px 0px #aaa;
    }

    .folder:before {
        content: '';
        width: 50%;
        height: 12px;
        border-radius: 5px 5px 0 0;
        background-color: #566472;
        position: absolute;
        top: -12px;
        left: 0px;
    }

    .folder:after {
        content: '';
        width: 50%;
        height: 10px;
        border-radius: 5px 5px 0 0;
        background-color: #708090;
        position: absolute;
        top: -8px;
        left: 0px;
    }
    .folder_name {
        margin:5px;
        padding:0px;
        float: left;
        text-indent: 10px;
        white-space: nowrap;
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


@endsection
    
