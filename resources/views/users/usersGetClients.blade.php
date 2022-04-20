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

                @if ($accountant_id == auth()->user()->id)
                 <div class="btn btn-sm float-right addClientBtn" data-toggle="modal" data-target="#editClientModal"><i class="fa fa-edit" style="margin-left: 10px;"></i> Edit Info</div>

                 <div class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#editClientModal"><i class="fa fa-file"></i> Make SOA</div>

                <!-- <i class="fa fa-search float-right" style="cursor: pointer;"></i> -->
                @endif
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
                        @if ($cor != "")
                            <img src="{{ asset('images/cor/'.$cor.'') }}">
                        @else
                            <div class="nofiles">
                                <p><i class="fa fa-file"></i> No [COR] uploaded yet</p>
                            </div>
                            <style type="text/css">
                                .disabledBtn {
                                    pointer-events: none;
                                    cursor: default;
                                    opacity: .3;
                                }
                            </style>
                        @endif
                        <p class="card-info">
                            <span><i class="fa fa-file"></i> [COR] Certificate of Registration</span>
                            <div class="uploadBtn">
                                 <a href="{{ url('images/cor/'.$cor.'')}}" target="_BLANK" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> View</a>
                                 <div class="btn btn-sm btn-info" data-toggle="modal" data-target="#uploadCorModal">Upload COR</div>
                                 <div class="float-right btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>
                            </div>
                        </p>
                    </div>

                </div>


                @if(session()->has('success'))
                    <script type="text/javascript">
                       Swal.fire({
                          icon: 'success',
                          title: 'Succesfully Uploaded!',
                          showConfirmButton: false,
                          timer: 1500
                        })
                    </script>

                @elseif(session()->has('error'))
                    <script type="text/javascript">
                       Swal.fire({
                          icon: 'error',
                          title: 'error occured',
                          showConfirmButton: false,
                          timer: 1500
                        })
                    </script>
                @endif

                <div class="card files-card col-sm-3">
                    <div>
                        @if ($sa != "")
                            <img class="saImage" src="{{ asset('images/sa/'.$sa.'') }}">
                        @else
                            <div class="nofiles">
                                <p><i class="fa fa-file"></i> No [SA] uploaded yet</p>
                            </div>
                            <style type="text/css">
                                .disabledBtn {
                                    pointer-events: none;
                                    cursor: default;
                                    opacity: .3;
                                }
                            </style>
                        @endif
                        <p class="card-info">
                            <span><i class="fa fa-file"></i> [SA] Service Aggrement</span>
                            <div class="uploadBtn">
                                <a href="{{ url('images/sa/'.$sa.'')}}" target="_BLANK" class="disabledBtn btn btn-sm btn-info"><i class="fa fa-eye"></i> View</a>
                                 <div class="btn btn-sm btn-info" data-toggle="modal" data-target="#uploadSaModal">Upload SA</div>
                                  <div class="disabledBtn float-right btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>
                            </div>
                        </p>
                    </div>
                </div>

                <div class="modal fade" id="uploadSaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="/saUpload" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLabel"><i class="fa fa-file"></i> Upload Service Aggrement Image</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <input type="hidden" value="{{ $id }}" name="clientId">
                                    <input type="file" name="image[]" multiple="multiple" accept="image/png, image/gif, image/jpeg" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-sm btn-primary">Upload</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="modal fade" id="uploadCorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="/corUpload" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLabel"><i class="fa fa-file"></i> Upload Certificate of Registration</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <input type="hidden" value="{{ $id }}" name="clientId">
                                    <input type="file" name="image">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-sm btn-primary">Upload</button>
                            </div>
                            </form>

                        </div>
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
            <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <input type="hidden" class="form-control form-control-sm id" value="{{ $id }}" placeholder="Name / Business Name" required>
                <div class="col form-group">
                    <label>Name / Business Name</label>
                    <input type="text" class="form-control form-control-sm name" value="{{ $name }}" placeholder="Name / Business Name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Email</label>
                    <input type="text" class="form-control form-control-sm email"  value="{{ $email }}" placeholder="Email (optional. Can input later)">
                </div>
                <div class="col form-group">
                    <label>Contact Number</label>
                    <input type="text" class="form-control form-control-sm contact"  value="{{ $contact }}" placeholder="Contact # (optional. Can input later)">
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Address</label>
                    <input type="text" class="form-control form-control-sm address" value="{{ $address }}" placeholder="Address" required>
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
                    <input type="text" class="form-control form-control-sm tin" value="{{ $tin }}" placeholder="000-000-000-0000" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Retainers Fee</label>
                    <input type="number" class="form-control form-control-sm rf" value="{{ $rf }}"  placeholder="&#8369; 0" required>
                </div>
                <div class="col form-group">
                    <label>ITR Fee</label>
                    <input type="number" class="form-control form-control-sm itr" value="{{ $itr }}" placeholder="&#8369; 0" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Date Signed</label>
                    <input type="date" class="form-control form-control-sm dateStarted" value="{{ $startDate }}" required>
                </div>
                <div class="col form-group">
                    <label>Date End</label>
                    <input type="date" class="form-control form-control-sm dateEnd" value="{{ $endDate }}" required>
                </div>
            </div>

           <!--  <div class="form-row">
                <div class="col form-group">
                    <label>Upload COR</label>
                    <input type="file" class="corUpload btn btn-sm btn-info">
                </div>
                <div class="col form-group">
                    <label>Upload Service Aggreement</label>
                    <input type="file" class="btn btn-sm btn-info">
                </div>
            </div> -->
<!-- 
    https://stackoverflow.com/questions/19447435/ajax-upload-image 
    https://stackoverflow.com/questions/2320069/jquery-ajax-file-upload
-->
            <div class="form-row">
                <div class="col form-group">
                    @if ($active == '1')
                        <input type="checkbox" checked data-toggle="toggle" class="activeToggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" value="1">
                    @else                
                        <input type="checkbox" data-toggle="toggle" class="activeToggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" value="1">
                    @endif
                    <div class="btn btn-sm btn-danger" onclick="deleteClient('{{ $id }}')"><i class="fa fa-trash"></i> Delete</div><small> <span class="text-danger">note:</span> "Delete" button permanently deletes client data.</small>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <small>Note: You can always change/edit this info later</small>
            <div type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</div>
            <button type="button" class="editClientInfoBtn btn btn-sm btn-primary" onclick="return false;">Save</button>
          </div>
        </form>

        </div>
      </div>
    </div>
</body>
</html>



<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
        $('#example').DataTable();
    });
    $('.activeToggle').bootstrapToggle('destroy').bootstrapToggle({
        size:     'small',
        // onstyle:  'info',
        // offstyle: 'default',
        width:    '100'
    });




    function deleteClient(id){
        Swal.fire({
          title: 'Are you sure?',
          text: "This will delete all the data of the client.",
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




    // $(".editClientInfoBtn").click(function(){

        $('.editClientInfoBtn').on('click', function(){
        // alert($("#corUpload")[0]);
        if($(".activeToggle").prop("checked") == true){
            var activeVal = '1';
        }else{
            var activeVal = '0';
        }

       


        $.ajax({
            type: "post",
            url: "{{ url('/editClient') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id : $(".id").val(),
                name : $(".name").val(),
                email : $(".email").val(),
                contact : $(".contact").val(),
                address : $(".address").val(),
                classification : $(".classification").val(),
                tin : $(".tin").val(),
                rf : $(".rf").val(),
                itr : $(".itr").val(),
                dateStarted : $(".dateStarted").val(),
                dateEnd : $(".dateEnd").val(),
                activeToggle : activeVal,
            },success:function(response){
                if (response == 'success') {
                    Swal.fire({
                      icon: 'success',
                      title: 'You have Succesfully updated Client info!',
                      showConfirmButton: false,
                      timer: 1500
                    })
                    setInterval(function(){
                        location.reload();
                    }, 1500);
                }else{
                    Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Something went wrong! Please try again',
                    })
                    console.log(response);
                    // alert(JSON.stringify(response));
                }
            },error:function(response){
                console.log(response);
                alert(JSON.stringify(response));
            }
        });
    });


    





</script>

@endsection
    
