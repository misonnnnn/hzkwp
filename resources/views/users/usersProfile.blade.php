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
                    <i class="fa fa-user"></i> Profile
                </li>
            </ol>

            
            
            
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
