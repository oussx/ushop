	<div class="container-fluid">
			<?php $total=0 ?>
			@if(isset($prods) && sizeof($prods)>0)
			
			  <ul class="list-group">
				  @foreach($prods as $prod)
				  	<?php $total = $total + $prod['price']?>
						<li class="list-group-item">
							<div class="row">
								<div><input type="hidden" value="{{$prod['id']}}" id="id"></div>
								<div class="col-md-5"><a href="" class="text-dark">{{$prod['name']}}</a></div>
								<div class="col-md-3 text-center"><span>{{$prod['qty']}}</span></div>
								<div class="col-md-3 text-center"><span class="text-dark">${{$prod['price']}}</span></div>
								<div class="cart-del col-md-1 alert-info text-center"><span class="text-dark font-weight-bold" >x</span></div>
							</div>
						</li>	
				   @endforeach
				</ul>
				<div id="total" class="text-right alert-danger text-success p-2 font-weight-bold">Total:   ${{$total}}</div>
            @else
				<div class="alert alert-light" role="alert">
					Your shopping cart is empty
				</div>
			@endif
    </div>
	
	<script>
		$(".cart-del").click(function() {
			//e.preventDefault();
			var $total=0;
			
			 $(this).parent().closest('li').remove();	
		});
	</script>