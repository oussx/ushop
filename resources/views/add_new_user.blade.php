<div class="container p-2">
	@if(isset($user))
		<h1 class="mt-3 h2">Update user</h1>
		<hr/>
		<?php $route='/u/usr';?>
	@else
		<h1 class="mt-3 h2">Add new user</h1>
		<hr/>
		<?php $route='/add_user';?>
	@endif
	
	@if($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach($error->all() as $error)
					<li>{{$error}}</li>
				
				@endforeach
			</ul>
	  </div>
	@endif
	<form class="form_add"  enctype="multipart/form-data">
	
	{{ csrf_field() }}
	  <div class="form-group">
		<label for="selectCat">Select User role</label>
		<select name="role" class="w-50 form-control" required>
						
			<option value="0" @if(isset($user) && $user->role==0) selected @endif >User</option>
							
			<option value="1" @if(isset($user) && $user->role==1) selected @endif>Admin</option>
							
			<option value="2" (@if(isset($user) && $user->role==2)) selected @endif>Moderator</option>
		</select>
	  </div>
	  
	  <div class="form-group">
		@if(isset($user))	
			<input type="hidden" value="{{$user->id}}" name="id"></input>
		@endif 
		<label for="userName">Name</label>
		<input type="text" class="w-50 form-control" id="userName" name="name" placeholder="Name" 
			@if(isset($user))
				value="{{$user->name}}"
			@endif 
			required />
	  </div>
	 
	  <div class="form-group">
		<label for="password">Password</label>
		<input type="password" class="w-50 form-control" id="password" name="password" placeholder="Password" 
			@if(isset($user))
				value="{{$user->password}}"
			@endif 
			required />
	  </div>
	  <div class="form-group">
		<label for="userEmail">Email</label>
		<input type="text" class="w-50 form-control" id="userEmail" name="email" placeholder="Emal" 
			@if(isset($user))
				value="{{$user->email}}"
			@endif 
			required />
	  </div>
	  
	  <div class="form-group">
		<label for="addPics">Add pictures</label>
		<input type="file" class="w-50 form-control-file" id="addPics" name="pics[]" multiple>
	  </div>
	  
	 
	  <button id="add_user" type="submit" class="w-50 btn btn-primary">Submit</button>
	</form>
</div>

<script>
	$(".form_add").submit(function(e){ //user clicks form submit button
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var form_data = $(this).serialize(); //prepare form data for Ajax post
    var button_content = $(this).find('button[type=submit]'); //get clicked button info
    button_content.html('Adding...'); //Loading button text //change button text 
	
    $.ajax({ //make ajax request
        url: "{{$route}}",
        type: "POST",
        //dataType:"json", //expect json value from server
        data: form_data,
		success:function(data){
			//var count=$( "#cart-bo").innerText;
			alert("User added successfully!");
			button_content.html('Submit'); //reset button text to original text
			
		}
			
		
    })
    e.preventDefault();
});
</script>