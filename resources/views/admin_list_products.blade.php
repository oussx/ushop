<div class="container p-2">
	<h1 class="mt-3 h2">List of products</h1>
	<hr/>
	<form method="POST" action="{{route('admin.dashboard.add')}}" enctype="multipart/form-data">
	{{ csrf_field() }}	  
          <div class="table-responsive">
            <table id="productsList" class="table table-striped table-sm table-bordered table-hover">
              <thead>
                <tr>
						
                  <th class="text-center align-middle">#</th>
                  <th class="text-center align-middle p-3">Product Name</th>
                  <th class="text-center align-middle">Description</th>
                  <th class="text-center align-middle">Price</th>
                  <th class="text-center align-middle p-3">Quantity</th>
                </tr>
              </thead>
              <tbody>
			  @foreach($prods as $prod)
                <tr scope="row">
				  
				  <td class="text-center align-middle p-1">
				  <input type="hidden" value="{{$prod->categories_id}}" id="cat"></input>
				  <input type="hidden" value="{{$prod->id}}" id="id"></input>
				  {{$prod->id}}</td>
                  <td class="text-center align-middle p-2">{{$prod->name}}</td>
                  <td class="p-2 align-middle">{{$prod->description}}</td>
                  <td class="text-center align-middle">{{$prod->price}}</td>
                  <td class="text-center align-middle">{{$prod->quantity}}</td>
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

				
				$(".table tbody").on("click",".modify",function(){
					var $row = $(this).closest("tr");
					var $id=$row.find('td:eq(0)').find('#id').val();
					var $cat=$row.find('td:eq(0)').find('#cat').val();
					var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

					$.ajax({
							type: 'POST',
							url: "{{route('admin.dashboard.product.get.update')}}", 
							data: {_token:CSRF_TOKEN, id:$id, cat:$cat},
							
							success: function(data, status){
								$("#_container").html(data);
							},
							error: function(xhr){
								alert(xhr.statusText);
							}
						/*$.post("{{route('admin.dashboard.product.update')}}", 
						{
							
							id:id,
							cat:"1"
						},
							function(data, status){
								$("#_container").html=data;
						});*/
						
						
					});
				});	
				
				$(".table tbody").on("click",".delete",function(){
					
						
					var $row = $(this).closest("tr");
					var $id=$row.find('td:eq(0)').find('#id').val();
					var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
					var r = confirm("Are you sure?");
					if (r == true) {
						$.ajax({
								type: 'POST',
								url: "{{route('admin.dashboard.product.delete')}}", 
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