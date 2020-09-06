	@extends("master")
	@section('title')
		Ishop:Best products, Best Prices
	@endsection
	@section('content')
	<?php $total=0 ?>
		<section class="container-fluid">
			<h3 class="col-lg-12 padding text-weight-bold">Billing details</h3>
			<div class="row container">
				<div class="col-md-8">
					<form method="POST" action="{{route('complete_order')}}">
						{{csrf_field()}}
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="w-50 form-control" id="name" name="name" placeholder="Name" value="" required />	
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="w-50 form-control" id="address" name="address" placeholder="Address" value="" required />	
						</div>
						<div class="form-group">
							<label for="city">City</label>
							<input type="text" class="w-50 form-control" id="city" name="city" placeholder="City" value="" required />	
						</div>
						<h3 class="mt-5 mb-5"> Payment details</h3>
						<div class="form-group">
							<label for="ccard">Credit or debit card</label>
							<input type="text" class="w-50 form-control" id="ccard" name="ccard" placeholder="Card number" value="" required />	
						</div>
						<div class="col-12 text-right"><button type="submit" class="btn btn-success w-100">Complete order </button></div>
					</form>
				</div>
					
				<div class="col-md-4">
					<hr />
					@foreach($prods as $prod)
					<?php $total = $total + $prod['price']?>
						<div class="row">
							<div class="col-md-3"> </div>
							<div class="col-md-8">{{$prod['name']}} <br />
								<div class="col-md-1 text-center text-success">${{$prod['price']}} </div>
							</div>
							
							<div class="col-md-1 text-center"> {{$prod['qty']}} </div>
						</div>
					<hr />
					@endforeach
					
					<div class="col-12 text-right"><span class="font-weight-bold">Total: ${{$total}} </span></div>
					
				
				</div>
			</div>
			
			@if($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						
						@endforeach
					</ul>
			  </div>
			@endif
	
			<p class="small pt-2">The price and availability of items at Ishop.com are subject to change. The Cart is a 
				temporary place to store a list of your items and reflects each item's most recent price. 
				Shopping Cart Learn more</p>


		</section><!--content center-->
	@endsection