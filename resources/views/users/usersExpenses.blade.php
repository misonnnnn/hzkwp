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
                    <i class="fa-solid fa-coins"></i> Expenses
                </li>
            </ol>

            <h5 style="margin-top:60px;color:#535763">
                <i class="fa-solid fa-coins"></i> Your Expenses

            </h5>
            <hr>
            
            <div class="container-fluid">
                <button class="btn btn-default float-right addBtn " style="" data-toggle="modal" data-target="#addClientModal"><i class="fa fa-plus"></i> Add</button>
                <table id="example" class="uk-table uk-table-hover uk-table-striped" style="width:100%;font-size: 13px;">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Supplier</th>
                            <th>Account Title</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($db as $data)
                        <tr>
                            <td>{{ $data->date }}</td>
                            <td>{{ $data->supplier }}</td>
                            <td>{{ $data->account_title }}</td>
                            <td>{{ $data->total }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                    
                </table>
            </div>
        </div>

       
    </div>


    <!-- modal -->
    <div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background:#55a7bf;">
            <h6 class="modal-title text-light" id="exampleModalLabel"><i class="fa fa-plus"></i><i class="fa fa-user"></i> Add Expenses</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST">
                
            <div class="form-row">
                <div class="col form-group">
                    <label>Suppliers Name</label>
                    <input type="text" class="form-control form-control-sm name inputs" placeholder="Name / Business Name" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Account Title</label>
                    <select class="form-control form-control-sm accountTitle">
                        <option value="Gas and Fuel">Gas and Fuel</option>
                        <option value="Supplies">Supplies</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="Food">Food</option>
                    </select>
                </div>
                <div class="col form-group">
                    <label>Date</label>
                    <input type="date" class="form-control form-control-sm date inputs">
                </div>
                
            </div>
            <div class="form-row">
                <div class="col-md-3 form-group">
                    <label>Amount</label>
                    <input type="text" class="form-control form-control-sm amount inputs" placeholder="0.00" required>
                </div>
            </div>
           
          </div>
          <div class="modal-footer">
            <small>Note: You can always change/edit this info later</small>
            <div type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</div>
            <button type="button" class="addExpenses btn btn-sm btn-primary" onclick="return false;">Add</button>
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


        function checkInputs() {
            var isValid = true;
            $('.inputs').filter('[required]').each(function() {
                if ($(this).val() === '') {
            $('.addExpenses').prop('disabled', true)
                isValid = false;
                return false;
            }
            });
                if(isValid) {$('.addExpenses').prop('disabled', false)}
                return isValid;
        }


        //Enable or disable button based on if inputs are filled or not
        $('input').filter('[required]').on('keyup',function() {
            checkInputs()
        })
        checkInputs()


           $(".addExpenses").click(function(){
                $.ajax({
                    type: "post",
                    url: "/addExpenses",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name : $(".name").val(),
                        accountTitle : $(".accountTitle").val(),
                        date : $(".date").val(),
                        amount : $(".amount").val(),
                        
                    },success:function(response){
                        if (response == 'success') {
                            Swal.fire({
                              icon: 'success',
                              title: 'You have Succesfully add a new Expenses!',
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



    });
</script>




<style type="text/css">
    .addBtn{
        margin-bottom: 10px;
        box-shadow: 0 0 3px 0 #bbb;

    }
    .addBtn:hover {
        box-shadow: 0 0 3px 0 #aaa;
        background: #ccc;
    }
</style>


@endsection
    
