@extends("master")

@section('title')
		uShop - Products in ...at best prices
@endsection
	
@section('content')
		<section class="container-fluid text-center">
			<div class="row mt-2">
				@if($products!==null && sizeof($products))
					@foreach($products as $prod)
						<form class="form-item">
						{{csrf_field()}}
							<div class="card border-primary m-2" style="width: 18rem;">
							  <a class="link" href="/p/{{$prod->id}}">	
								<img class="card-img-top img-fluid" src="/storage/{{$prod->images[0]->path}}" alt="{{$prod->name}}">
							  <a/>	
							 <div class="card-body border-success">
								<a href="/p/{{$prod->id}}">
								  <h5 class="card-title">{{$prod->name}}</h5>
								</a>  
								<h5 class="card-title text-info">${{$prod->price}}</h5>
								<p class="card-text clipped-text">${{$prod->description}}</p>
								<button type="submit" class="btn btn-outline-primary">Add to Cart</button>
							  </div>
							</div>	
							<input type="hidden" name="id" value ="{{$prod->id}}"></input>
							<input type="hidden" name="name" value ="{{$prod->name}}"></input>
							<input type="hidden" name="price" value ="{{$prod->price}}"></input>
							<input type="hidden" name="qty" value ="1"></input>
						</form>
					@endforeach
				@else
					<div class="col-md-12 font-weight-bold text-secondary text-center pt-5">
						<h2>sorry, there are no products in this category yet, please check again later</h2>
					</div>
				@endif
			</div>
		</section>
		
		<section class="container-fluid row text-center mb-5">
				<hr class="col-12" />
				<h4 class="col-12 text-center text-success mb-4">Recommanded for you</h4>
				<div class="owl-carousel owl-theme">
					@foreach($hot_deals as $element)
						<form class="form-item">
						{{csrf_field()}}
							<div class="item card-deck">
							  <div class="card border-success">
								<a href="/p/{{$element->id}}">
									<img class="card-img-top img-fluid" src="/storage/{{$element->firstimage->path}}" alt="{{$element->name}}">
								</a>
								<div class="card-body">
								  <h5 class="card-title text-success">{{$element->name}}</h5>
								  <p class="card-text clipped-text">{{$element->description}}</p>
								</div>
								<div class="card-footer">
								  <small class="text-muted">${{$element->price}}</small><br />
								  <button type="submit" class="btn btn-outline-primary">Add to cart</button>
								</div>
							  </div>
							</div>
							<input type="hidden" name="id" value ="{{$element->id}}"></input>
							<input type="hidden" name="name" value ="{{$element->name}}"></input>
							<input type="hidden" name="price" value ="{{$element->price}}"></input>
							<input type="hidden" name="qty" value ="1"></input>
						</form>	
					@endforeach
				</div>
		</section>
@endsection