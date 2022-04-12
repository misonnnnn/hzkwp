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
                    <i class="fas fa-wrench"></i> Settings
                </li>
            </ol>

            <h5 style="margin-top:60px;color:#535763">
                <i class="fas fa-wrench"></i> Settings
            </h5>
            <hr>
            
            <div class="container">
                
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

</style>


@endsection
    
