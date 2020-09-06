	@extends("master")
	@section('title')
		Ishop:Best products, Best Prices
	@endsection
	@section('content')
	<?php $total=0 ?>
		<section class="container-fluid">
			<h3 class="col-lg-12 padding text-weight-bold">Shopping cart</h3>
			<div class=" col-8">
				<div class="row">
					<div class="col-md-9 pl-3"> Item description</div>
					<div class="col-md-1 text-center">Price </div>
					<div class="col-md-1 text-center"> Quantity </div>
				</div>
				<hr />
				@foreach($prods as $prod)
				<?php $total = $total + $prod['price']?>
					<div class="row">
						<div class="col-md-2"> </div>
						<div class="col-md-7">{{$prod['name']}} <br />
							<span class="text-danger">Delete</span>
						</div>
						<div class="col-md-1 text-center text-success">${{$prod['price']}} </div>
						<div class="col-md-1 text-center"> {{$prod['qty']}} </div>
					</div>
				<hr />
				@endforeach
				
				<div class="col-12 text-right"><span class="font-weight-bold">Total: ${{$total}}</span></div>
				<div class="row">
					<div class="col-6 text-left"><button id="continue_shopping" class="btn btn-info w-50">Continue shopping </button></div>
					<div class="col-6 text-right"><button id="proceed_check_out" class="btn btn-success w-50">Check out </button></div>
				</div>
			
			</div>
			<p class="small pt-2">The price and availability of items at Ishop.com are subject to change. The Cart is a 
				temporary place to store a list of your items and reflects each item's most recent price. 
				Shopping Cart Learn more</p>


		</section><!--content center-->
	@endsection