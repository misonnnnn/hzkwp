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
                    <a href="{{ url('accountants') }}"><i class="fa fa-users"></i> Accountants</a>
                </li>
                <li class="breadcrumb-item">
                    <i class="fa fa-user"></i>  {{ $name }}
                </li>
            </ol>
           

             <header class="header">
                <div class="container">
                  <div class="teacher-name">
                    <div class="row">
                    <div class="col-sm-9">
                      <h2><strong> {{ $name }}</strong></h2>
                    </div>
                    <div class="col-sm-3">
                      <div class="button pull-right">
                        <a href="#" class="btn btn-outline-info btn-sm">Edit Profile <i class="fa fa-pencil"></i></a>
                      </div>
                    </div>
                    </div>
                  </div>

                  <div class="row" style="margin-top:20px;">
                    <div class="col-sm-3"> 
                      <a href="#"> <img class="rounded-circle" src="{{ asset('resources/'.auth::user()->picture) }}" alt="Rick" ></a>
                    </div>

                    <div class="col-sm-6"> 
                      <h5> {{ucfirst(trans($position))}}, <small>Hezekiah Accountant Services Co.</small></h5>
                      <p>{{$branch}} branch</p>
                      <p>Bio: no Bio</p>
                    </div>

                    <div class="col-sm-3 text-center social">
                      <span class="number">Phone:<strong> {{ $contactNumber != '' ? $contactNumber : ''}}</strong></span>
                      <div class="button-email">
                        <a href="mailto:arick@yahoo.com" target="_BLANK" class="btn btn-outline-info btn-block"><i class="fa fa-envelope-o"></i> Send Email</a>
                      </div>
                      <div class="social-icons">
                        <a href="#">
                        <span class="fa-stack">
                          <i class="fa fa-circle fa-stack-2x" ></i>
                          <i class="fa-brands fa-facebook-f fa-stack-1x fa-inverse"></i>
                        </span></a>
                        <a href="#">
                        <span class="fa-stack">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa-brands fa-google fa-stack-1x fa-inverse"></i>
                        </span></a>
                        <a href="#">
                        <span class="fa-stack">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa-brands fa-linkedin-in fa-stack-1x fa-inverse"></i>
                        </span></a>

                      </div>
                    </div>
                  </div>
                </div>
              </header>
              <div class="container">
              <div class="row">
                    <div class="col-sm-12">
                      <div class="card card-block text-xs-left" style="padding:10px;">
                        <h5><i class="fa fa-user fa-fw"></i>About</h5>
                          <p> {{ucfirst(trans($name))}} is currently handling over <b>{{ $accClient }}</b>  satisfied clients.</p>
                      </div>
                    </div>
                  </div>
                <div class="col-sm-12">
                    <div class="card card-block" style="padding:10px;" >
                      <h5><i class="fa fa-rocket fa-fw"></i>Interests</h5>
                      <ul class="list-group" style="margin-top:15px;margin-bottom:15px;">
                        <li class="list-group-item">This is a sample paragraph</li>
                        <li class="list-group-item">This is a sample paragraph</li>
                        <li class="list-group-item">This is a sample paragraph</li>
                        <li class="list-group-item">This is a sample paragraph</li>
                      </ul>
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
    body{
  background: #DAE3E7;
font-family: "Roboto", sans-serif
}
img{
  max-width:100%
}
.row{
  margin-top: 40px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 3px 10px 0 rgba(0, 0, 0, 0.1);
}

.header {
  padding: 10px 0;
  background: #f5f5f5;
  border-top: 3px solid #55a7bf;
}
.button-email{
  margin:10px 0
}
h5, .fa-circle{
  color:#55a7bf
}

.list-group {
    list-style: disc inside;

}

.list-group-item {
    display: list-item;
}

 .find-more{
   text-align: right;
 }


.label-theme{
  background: #3AAA64;
  font-size: 14px;
  padding: .3em .7em .3em;
  color: #fff;
  border-radius: .25em;
}

.label a{
  color: inherit;
}

</style>




@endsection
    
