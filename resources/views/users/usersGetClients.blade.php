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
                    <a href="{{ url('home') }}"><i class="fa fa-home"></i> </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('clients') }}"><i class="fa fa-users"></i> clients</a>
                </li>
                <li class="breadcrumb-item">
                    <i class="fa fa-user"></i>  {{ $name }}
                </li>
            </ol>

            <h5 style="margin-top:60px;color:#535763">
                <i class="far fa-address-book"></i> 
                Client Handling
                 <div class="btn btn-sm float-right addClientBtn" data-toggle="modal" data-target="#editClientModal"><i class="fa fa-edit" style="margin-left: 10px;"></i> Edit Info</div>

                 <div class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#editClientModal"><i class="fa fa-file"></i> Make SOA</div>

                <!-- <i class="fa fa-search float-right" style="cursor: pointer;"></i> -->
            </h5>

            <hr>

            <h4 style="color:#535763"> {{ $name }}</h4>
            <h6 style="color:#535763;">
                <i class="fa fa-home"></i> 
                Address: {{ $address }}
            </h6>
            <span style="color:#535763;font-size: 13px;">
                <i class="far fa-address-card"></i> 
                Taxpayer Identification Number: {{ $tin }}
            </span>

            <div class="row" style="width: 50%;">
                <p class="col-sm-6" style="font-size: 13px;color:#535763;width: 100%;margin:0">
                    <i class="fas fa-tags"></i>
                    {!! $active == '1' ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>' !!}
                </p>
                <p class="col-sm-6" style="font-size: 13px;color:#535763;width: 100%;margin:0">
                    <i class="fas fa-tags"></i> 
                    {{ $businessClass }}
                </p>
                <p class="col-sm-6" style="font-size: 13px;color:#535763;width: 100%;margin:0">
                    <i class="fas fa-envelope"></i> 
                    {{ $email !='' ? $email : 'email not provided'}}
                </p>
                <p class="col-sm-6" style="font-size: 13px;color:#535763;width: 100%;margin:0">
                    <i class="fas fa-phone"></i>
                    {{ $contact !='' ? $contact : 'contact not provided'}}
                </p>
            </div>

            <div class="container row" style="margin-top: 20px;">
                <div class="card files-card col-sm-3">
                    <div>
                        <img src="{{ asset('resources/cor.jpg') }}">
                        <a href="{{ asset('resources/cor.jpg') }}" target="_BLANK" class="card-info">
                            <span><i class="fa fa-file"></i> [COR] Certificate of Registration</span>
                        </a>
                    </div>
                </div>

                <div class="card files-card col-sm-3">
                    <div>
                        <img src="{{ asset('resources/0001.jpg') }}">
                        <a href="{{ asset('resources/0001.jpg') }}" target="_BLANK" class="card-info">
                            <span><i class="fa fa-file"></i> [SA] Service Aggrement</span>
                        </a>
                    </div>
                </div>
            </div>
            

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

          <div class="modal-header" style="background:#55a7bf;">
            <h6 class="modal-title text-light" id="exampleModalLabel"><i class="fa fa-edit"></i> Edit Client Info Form</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form method="POST">
                
            <div class="form-row">
                <div class="col form-group">
                    <label>Name / Business Name</label>
                    <input type="text" class="form-control form-control-sm name" value ="{{ $name }}" placeholder="Name / Business Name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Address</label>
                    <input type="text" class="form-control form-control-sm address" value ="{{ $address }}" placeholder="Address" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Business Classification</label>
                    <select class="form-control form-control-sm classification" required>
                        <option selected disabled>Select</option>
                        @if ($businessClass == 'individual')
                            <option value="individual" selected>Individual</option>   
                            <option value="non-individual">Non-individual</option>
                        @else
                            <option value="individual">Individual</option>   
                            <option value="non-individual" selected>Non-individual</option>
                        @endif
                           
                    </select>
                </div>
                <div class="col form-group">
                    <label>Tin Number</label>
                    <input type="text" class="form-control form-control-sm tin" value="{{ $tin }}"  placeholder="000-000-000-0000" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Retainers Fee</label>
                    <input type="number" class="form-control form-control-sm rf"  value="{{ $rf }}" placeholder="&#8369; 0" required>
                </div>
                <div class="col form-group">
                    <label>ITR Fee</label>
                    <input type="number" class="form-control form-control-sm itr" value="{{ $itr }}" placeholder="&#8369; 0" required>
                </div>
            </div>
            <div class="float-left">
                <div class="btn btn-sm">
                    <input type="checkbox" id="activeToggle" checked data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
                </div>
                <div class="btn btn-sm btn-danger" onClick="deleteClient('{{ $id }}')">
                    <i class="fa fa-trash"></i>
                    delete
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <!-- <small>Note: You can always change/edit this info later</small> -->
            <div type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</div>
            <button type="button" class="submitAddClientBtn btn btn-sm btn-primary" onclick="return false;">Save</button>
          </div>
        </form>

        </div>
      </div>
    </div>
</body>
</html>

<style type="text/css">
    .custom-switch {
        width: 200px !important;
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $('#example').DataTable();
    });
    $('#activeToggle').bootstrapToggle('destroy').bootstrapToggle({
        size:     'small',
        // onstyle:  'info',
        // offstyle: 'default',
        width:    '100'
    });




    function deleteClient(id){
        Swal.fire({
          title: 'Are you sure?',
          text: "This will delete all the data of the client?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
                  type: 'POST',
                  url: '/deleteClient',
                  data: {
                    '_token' : "{{ csrf_token() }}",
                    'clientId' : id
                  },
                  success: function(resultData) { 
                      console.log(resultData);
                        if (resultData=='success') {
                            Swal.fire({
                            title : 'Deleted!',
                            text :'Client has been deleted.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer : 1000
                        })
                        setInterval(function(){
                            window.location.href = "{{ url('/clients')}}";
                        },1000);
                      }else{
                        alert('there was an error. Please try again.')
                      }
                  }
            });
          }
        });
    }
</script>

@endsection
    
