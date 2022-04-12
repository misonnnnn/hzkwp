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
            <div class="container">
                    <img class="accDP" src="{{ asset('resources/'.$picture) }}">
                <div class="accMainDetails">
                    <h5 class="accName">{{$name}}</h5>
                    <p class="accSub"><i class="fa fa-caret-right"></i> {{$position}} in <b> {{ $branch }} Branch! </b></p>
                </div>
                <hr>


                <div class="row">
                    <div class="col-4">
                        <div class="accContactDiv">
                            <h6>Contacts</h6>
                            <hr>

                            <p><i class="fa fa-phone"></i> {{ $contactNumber }}</p>
                            <p><i class="fa fa-envelope"></i> {{$email}}</p>
                            <p><i class="fab fa-facebook"></i> <a target="_BLANK" href="https://www.facebook.com/misonnn">www.facebook.com/misonnn</a></p>
                        </div> 
                    </div>

                    <div class="col">
                        <div class="accAbout">
                            <h6>About</h6>
                            <hr>
                            <p><i class="fas fa-braille"></i> {{ $name }} is currently handling over <b>{{ $accClient }}</b>  satisfied clients.</p>
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






@endsection
    
