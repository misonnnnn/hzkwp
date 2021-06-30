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
                    <i class="fa fa-tachometer-alt"></i> Dashboard
                </li>
            </ol>

            <div class="greet">
                <h5> Hi,  {{ Auth::user()->name }}!</h5>
                <span><i class="fa fa-bell"></i> You have 2 new notifications! <a href="#">Check it now!</a></span>
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-blue order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Active Clients</h6>
                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{ $getActiveClientCounts }}</span></h2>
                                <p class="m-b-0">Overall Clients<span class="f-right"> {{ $getClientCounts }}</span></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-green order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Active Clients</h6>
                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{ $getActiveClientCounts }}</span></h2>
                                <p class="m-b-0">Overall Clients<span class="f-right"> {{ $getClientCounts }}</span></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-yellow order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Active Clients</h6>
                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{ $getActiveClientCounts }}</span></h2>
                                <p class="m-b-0">Overall Clients<span class="f-right"> {{ $getClientCounts }}</span></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-pink order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Active Clients</h6>
                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{ $getActiveClientCounts }}</span></h2>
                                <p class="m-b-0">Overall Clients<span class="f-right"> {{ $getClientCounts }}</span></p>
                            </div>
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
    });
</script>

@endsection
