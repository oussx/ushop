<div class="container p-2">
	
	
	@if(isset($prod))
		<h1 class="mt-3 h2">Update product</h1>
		<hr/>
		<?php $route='/u/p';?>
	@else
		<h1 class="mt-3 h2">Add new product</h1>
		<hr/>
		<?php $route='/add';?>
	@endif
	
		<form method="POST" action="{{$route}}" id="add_product"  enctype="multipart/form-data">
	
	{{ csrf_field() }}
	  <div class="form-group">
		<label for="selectCat">Select a category</label>
		<select name="cat_id" class="w-50 form-control" required>
			
				@if(sizeof($cats)>1)
					<option value="">Select a category</option>
					@foreach($cats as $cat)
						<option value="{{$cat->id}}">{{$cat->name}}</option>
					@endforeach	
				@else
					<option value="{{$cats->id}}">{{$cats->name}}</option>
				@endif	
		</select>
	  </div>
	  
	  <div class="form-group">
		@if(isset($prod))	
			<input type="hidden" value="{{$prod->id}}" name="id"></input>
		@endif 
		<label for="prodName">Product name</label>
		<input type="text" class="w-50 form-control" id="prodName" name="name" placeholder="Product name" 
			@if(isset($prod))
				value="{{$prod->name}}"
			@endif 
			required />
	  </div>
	  <div class="form-group">
		<label for="prodDesc">Description</label>
		<textarea class="w-50 form-control" id="prodDesc" name="desc" placeholder="Description" required >@if(isset($prod)){{$prod->description}}@endif</textarea>
	  </div>
	  
	  <div class="form-group">
		<label for="price">Price</label>
		<input type="text" class="w-50 form-control" id="price" name="price" placeholder="Price" 
			@if(isset($prod))
				value="{{$prod->price}}"
			@endif 
			required />
	  </div>
	  
	  <div class="form-group">
		<label for="quantity">Quantity</label>
		<input type="text" class="w-50 form-control" id="quantity" name="quantity" placeholder="Quantity" 
		@if(isset($prod))
				value="{{$prod->quantity}}"
		@endif 
		required />
	  </div>
	  <div class="form-group">
		<label for="addPics">Add pictures</label>
		<input type="file" class="w-50 form-control-file" id="addPics" name="pics[]" multiple>
	  </div>
	  
	  <div class="form-check">
		<input type="checkbox" class="form-check-input" id="exampleCheck1">
		<label class="form-check-label" for="exampleCheck1">Available</label>
	  </div>
	  <button type="submit" class="w-50 btn btn-primary">Submit</button>
	</form>
</div>
<?php /*
<script>
	$("#add_product").submit(function(e){ //user clicks form submit button
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
			alert("Product added with success!");
			button_content.html('Submit'); //reset button text to original text
			
		}	
		
    })
    e.preventDefault();
});
</script>
*/?>

