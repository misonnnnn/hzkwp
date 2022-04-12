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
                    <i class="fa fa-users"></i> Accountants
                </li>
            </ol>

            <h5 style="margin-top:60px;color:#535763"><i class="fa fa-users"></i> 
                Accountants
            </h5>
            <hr>

            <table id="example" class="display" style="width:100%;font-size: 13px;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Branch</th>
                        <th>Online</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accountants as $acc)
                
                    <tr>
                        <td><img src="{{ asset('resources/'.$acc->picture) }}" style="height: 40px;width:40px;border-radius: 3px;padding:2px;box-shadow: 0 0 4px 0 #444;margin-right: 10px;"> {{ $acc->name }}</td>
                        <td>{{ $acc->branch }}</td>
                        <td><span class="badge badge-success">Online</span></td>
                        <td><a href="{{ url('/accountants/'.$acc->id) }}" class="btn btn-sm btn-primary" style="color:#fff;"><i class="fa fa-eye"></i> View</a></td>
                    @endforeach
                    </tr>
                </tbody>

                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Branch</th>
                        <th>Online</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
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
    
