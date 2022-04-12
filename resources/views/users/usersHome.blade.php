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
                <span><i class="fa fa-bell"></i> You have 2 new notifications! Check it now!</span>
            </div>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-blue order-card">
                            <div class="card-block">
                                <h6 class="m-b-20">Users</h6>
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
                                <h6 class="m-b-20">Inactive Clients</h6>
                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{ $getInactiveClientCounts }}</span></h2>
                                <p class="m-b-0">Overall Clients<span class="f-right"> {{ $getClientCounts }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-8 mx-auto">
                        <h6><i class="fa-solid fa-chart-line"></i> Sales & Expenses Chart</h6>
                        <canvas id="myChart" style="width:100%"></canvas>
                    </div>
                </div>
            </div>

            <div class="container-fluid" style="margin-top: 30px;">
                <div class="row">
                    <div class="col-4 activity_div">
                        <h6>Activities <i class="fas fa-tasks"></i></h6>
                        <hr>

                        
                       @foreach ($users_activities as $act)
                        <div class="row" style="border-bottom:1px #aaa solid;padding:0px 20px">
                            <div class="col-12" style="font-size: 13px;"><i class="fa fa-circle-dot"></i> <strong>{{ $act->activity_name }}</strong> </div>
                            <div class="col-12" style="font-size: 13px; text-indent: 15px;"> {{ $act->description }} </div>
                            <div class="col-12" style="font-size: 13px; text-indent: 15px;text-align: right; "> {{ $act->date }} </div>
                        </div>
                       @endforeach
                        


                    </div>

                    <div class="col-4 announcement_div">
                        <h6>Announcements <i class="fas fa-stream"></i></h6>
                        <hr>

                        <p class="noAct" style="font-size: 13px;">no announcement yet</p>
                    </div>

                </div>
            </div>

           
        </div>
    </div>


    <img class="backdesign" src="{{ asset('resources/backdesign.png') }}">
    

    <style type="text/css">
        .backdesign {
            position: fixed;
            z-index: -99;
            right: 0px;
            bottom:-50px;
            height: 1000px;
            opacity: .4;
            transform: rotate(20deg);
            display: none;
        }

        .activity_div {
            padding:10px;

        }
        .announcement_div {
            padding:10px;

        }
    </style>
</body>
</html>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<script type="text/javascript">
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();




    });

    var myChart = new Chart("myChart", {
  type: "scatter",
  data: {},
  options: {}
});
    var myChart = new Chart("myChart", {
  type: "line",
  data: {},
  options: {}
});
    var myChart = new Chart("myChart", {
  type: "bar",
  data: {},
  options: {}
});

    var xValues = [1,2,3,4,5,6,7,8,8,10,11,12];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478,5000],
      borderColor: "red",
      fill: false
    },{
      data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000],
      borderColor: "green",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});
</script>

@endsection
