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
                    <a href="{{ url('clients') }}"><i class="fa fa-users"></i> Your Clients </a>
                </li>
                <li class="breadcrumb-item">
                    <i class="fa fa-users"></i> Clients List
                </li>
            </ol>

            <h5 style="margin-top:60px;color:#535763"><i class="fa fa-users"></i> 
                All Clients

                <!-- <div class="btn btn-sm float-right addClientBtn" data-toggle="modal" data-target="#addClientModal"><i class="fa fa-plus"></i> Add CLient</div> -->
            </h5>
            <hr>

            <table id="example" class="display" style="width:100%;font-size: 13px;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Tin</th>
                        <th>Active</th>
                        <th>Retainers Fee</th>
                        <th>ITR Fee</th>
                        <th>Start Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach ($clientsData as $cdt)
                     <tr>
                        <td>{{ $cdt->name }}</td>
                        <td>{{ $cdt->tin }}</td>
                        <td>{{ $cdt->active == '1' ? 'active' : 'inactive' }}</td>
                        <td>{{ number_format($cdt->retainersFee, 2) }}</td>
                        <td>{{ number_format($cdt->itr, 2) }}</td>
                        <td>{{ $cdt->startDate }}</td>
                        <td><a href="{{ url('clients/'.$cdt->id.'') }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Manage</a></td>
                    </tr>

                @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Tin</th>
                        <th>Active</th>
                        <th>Retainers Fee</th>
                        <th>ITR Fee</th>
                        <th>Start Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background:#55a7bf;">
            <h6 class="modal-title text-light" id="exampleModalLabel"><i class="fa fa-plus"></i><i class="fa fa-user"></i> Add Client form</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST">
                
            <div class="form-row">
                <div class="col form-group">
                    <label>Name / Business Name</label>
                    <input type="text" class="form-control form-control-sm name inputs" placeholder="Name / Business Name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Email</label>
                    <input type="text" class="form-control form-control-sm email" placeholder="Email (optional. Can input later)">
                </div>
                <div class="col form-group">
                    <label>Contact Number</label>
                    <input type="text" class="form-control form-control-sm contact" placeholder="Contact # (optional. Can input later)">
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Address</label>
                    <input type="text" class="form-control form-control-sm address inputs" placeholder="Address" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Business Classification</label>
                    <select class="form-control form-control-sm classification" inputs required>
                        <option selected disabled>Select</option>   
                        <option value="individual">Individual</option>   
                        <option value="non-individual">Non-individual</option>   
                    </select>
                </div>
                <div class="col form-group">
                    <label>Tin Number</label>
                    <input type="text" class="form-control form-control-sm tin" inputs placeholder="000-000-000-0000" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Retainers Fee</label>
                    <input type="number" class="form-control form-control-sm rf" inputs placeholder="&#8369; 0" required>
                </div>
                <div class="col form-group">
                    <label>ITR Fee</label>
                    <input type="number" class="form-control form-control-sm itr" inputs placeholder="&#8369; 0" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Date Signed</label>
                    <input type="date" class="form-control form-control-sm dateStarted" required>
                </div>
                <div class="col form-group">
                    <label>Date End</label>
                    <input type="date" class="form-control form-control-sm dateEnd" required>
                </div>
            </div>

            
          </div>
          <div class="modal-footer">
            <small>Note: You can always change/edit this info later</small>
            <div type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</div>
            <button type="button" class="submitAddClientBtn btn btn-sm btn-primary" onclick="return false;">Add</button>
          </div>
        </form>

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

        function checkInputs() {
            var isValid = true;
            $('.inputs').filter('[required]').each(function() {
                if ($(this).val() === '') {
            $('.submitAddClientBtn').prop('disabled', true)
                isValid = false;
                return false;
            }
            });
                if(isValid) {$('.submitAddClientBtn').prop('disabled', false)}
                return isValid;
        }


        //Enable or disable button based on if inputs are filled or not
        $('input').filter('[required]').on('keyup',function() {
            checkInputs()
        })
        checkInputs()
    $(".submitAddClientBtn").click(function(){

        $.ajax({
            type: "post",
            url: "/addClient",
            data: {
                _token: "{{ csrf_token() }}",
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
            },success:function(response){
                if (response == 'success') {
                    Swal.fire({
                      icon: 'success',
                      title: 'You have Succesfully add a new Client!',
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
                }
                

            },error:function(response){
                alert(JSON.stringify(response));
            }
        });
    });



</script>






@endsection
    
