<h4>Hi Admin! you are logged In! </h4>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<h3>Account Request</h3>

<table border="1">
                <thead>
                    <tr>
                        <th>email</th>
                        <th>name</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
               	@foreach ($usersData as $dt)
                     <tr>
                        <td>{{ $dt->email }}</td>
                        <td>{{ $dt->name }}</td>
                        <td><a href="#" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> <button id = "{{$dt->email}}" onClick="reply_click(this.id)">Approve</button></a></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>email</th>
                        <th>name</th>
                        <th>action</th>
                       
                    </tr>
                </tfoot>
            </table>


<a class="dropdown-item" href="{{ route('logout') }}"
   onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>





<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>




  <script type="text/javascript">
      function reply_click(clicked_id)
          {
              // alert(clicked_id);
                Swal.fire({
                  title: 'Approve this account?',
                  text: clicked_id,
                  icon: 'info',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, confirm'
                }).then((result) => {
                  $.ajax({
                        type: "post",
                        url: "/approveAccount",
                        data: {
                            _token: "{{ csrf_token() }}",
                            email : clicked_id,
                            
                        },success:function(response){
                            if (response == 'success') {
                                Swal.fire({
                                  icon: 'success',
                                  title: 'You have Succesfully approve a new Account',
                                  showConfirmButton: false,
                                  timer: 1500
                                })
                                setInterval(function(){
                                    location.reload();
                                }, 1500);
                            }else{
                                alert(JSON.stringify(response));
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
                })
          }
</script>
