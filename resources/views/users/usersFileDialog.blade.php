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
                    <i class="fa-solid fa-laptop-file"></i> Files Dialog
                </li>
            </ol>

            <h5 style="margin-top:60px;color:#535763">
                <i class="fa-solid fa-laptop-file"></i> Files Dialog
            </h5>
            <hr>
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <h5>File Request</h5>
                        <hr>
                        <div class="form-row">
                            <div class="col form-group">
                                <label>File Name</label>
                                <input type="text" class="form-control form-control-sm fileName" inputs placeholder="What file you want to request" required>
                            </div>
                            <div class="col form-group">
                                <label>Request to </label>
                                <select class="form-control form-control-sm">
                                    <option disabled="" selected="">Select</option>
                                    @foreach ($accountant as $acc)
                                    <option>{{ $acc->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col form-group">
                                <label>For Client</label>
                                <select class="form-control form-control-sm">
                                    <option disabled="" selected="">Select</option>
                                    <option>RMMR</option>
                                    <option>One Max Trucking Services</option>
                                    <option>Pancit Boys</option>
                                    <option>Ladioray Jericho</option>
                                </select>
                            </div>
                        </div>

                        <button type="button" class="submitRequest btn btn-sm btn-primary" onclick="return false;">Submit Request</button>
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

</style>


@endsection
    
