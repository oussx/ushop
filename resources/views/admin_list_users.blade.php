<div class="container p-2">
	<h1 class="mt-3 h2">List of registred users</h1>
	<hr/>
	<form method="" enctype="multipart/form-data">
	{{ csrf_field() }}	  
          <div class="table-responsive">
			<button id="add_user" class ="btn btn-primary mb-3 px-5">Add new user</button>
            <table id="productsList" class="table table-striped table-sm table-bordered table-hover">
              <thead>
                <tr>
						
                  <th class="text-center align-middle">#</th>
                  <th class="text-center align-middle p-3">Name</th>
                  <th class="text-center align-middle">Email</th>
                  <th class="text-center align-middle">Password</th>
                  <th class="text-center align-middle p-3">Role</th>
				  <th class="text-center align-middle p-3">Register Date</th>
                </tr>
              </thead>
              <tbody>
			  @foreach($users as $user)
                <tr scope="row">
				  
				  <td class="text-center align-middle p-1">
				  <input type="hidden" value="{{$user->id}}" id="id"></input>
				  {{$user->id}}</td>
                  <td class="text-center align-middle p-2">{{$user->name}}</td>
                  <td class="p-2 align-middle">{{$user->email}}</td>
                  <td class="text-center align-middle">{{$user->password}}</td>
                  <td class="text-center align-middle">
					<select name="role" class="w-100 form-control" disabled required>
						
								<option value="0" @if($user->role==0) selected @endif >User</option>
							
								<option value="1" @if($user->role==1) selected @endif>Admin</option>
							
								<option value="2" (@if($user->role==2)) selected @endif>Moderator</option>
					</select>
				   </td>
				  <td class="text-center align-middle">{{$user->created_at}}</td>
				  <td class="text-center align-middle p-3">
					 <a href="#"><span id="modify" class="modify text-info">Modify</span></a>
					 <a href="#"><span class="delete text-danger" >Delete</button></a>
				  </td>
                </tr>
               @endforeach	
              </tbody>
            </table>
          </div>
	</form>
</div>

<script>
			$(document).ready(function(){
				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
				$("#add_user").click(function(){
					$("#_container").load("{{route('admin.dashboard.user.add.get')}}", function(response, status, xhr) {
					  if (status == "error") {
						  console.log(xhr.status + " " + xhr.statusText);
						}
					});	
				});
				$(".table tbody").on("click",".modify",function(){
					var $row = $(this).closest("tr");
					var $id=$row.find('td:eq(0)').find('#id').val();

					$.ajax({
							type: 'POST',
							url: "{{route('admin.dashboard.user.get.update')}}", 
							data: {_token:CSRF_TOKEN, id:$id},
							
							success: function(data, status){
								$("#_container").html(data);
							},
							error: function(xhr){
								alert(xhr.statusText);
							}						
					});
				});	
				
				$(".table tbody").on("click",".delete",function(){
					
						
					var $row = $(this).closest("tr");
					var $id=$row.find('td:eq(0)').find('#id').val();
					var r = confirm("Are you sure?");
					if (r == true) {
						$.ajax({
								type: 'POST',
								url: "{{route('admin.dashboard.user.delete')}}", 
								data: {_token:CSRF_TOKEN, id:$id},
								
								success: function(data, status){
									$row.remove();
								},
								error: function(xhr){
									alert(xhr.statusText);
								}
						});
					
					}
				});
			});
		</script>