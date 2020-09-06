	@extends("master")
	@section('title')
		Ishop:Best products, Best Prices
	@endsection
	@section('content')
		<section id="featured" class="container-fluid row center">
			<h3 class="col-lg-12 text-center padding">Featured products</h3>
			@foreach($data as $element)
				<form class="form-item">
				{{csrf_field()}}
					<div class="card border-primary m-2" style="width: 18rem;">
					  <a class="link" href="/p/{{$element->id}}">	
						<img class="card-img-top img-fluid" src="/storage/{{$element->images[0]->path}}" alt="{{$element->name}}">
					  <a/>	
					 <div class="card-body border-success">
						<a href="/p/{{$element->id}}">
						  <h5 class="card-title">{{$element->name}}</h5>
						</a>  
						<h5 class="card-title text-info">${{$element->price}}</h5>
						<p class="card-text clipped-text">${{$element->description}}</p>
						<button type="submit" class="btn btn-outline-primary">Add to Cart</button>
					  </div>
					</div>	
					<input type="hidden" name="id" value ="{{$element->id}}"></input>
					<input type="hidden" name="name" value ="{{$element->name}}"></input>
					<input type="hidden" name="price" value ="{{$element->price}}"></input>
					<input type="hidden" name="qty" value ="1"></input>
				</form>
			@endforeach
			
			<section class="container-fluid row text-center">
				<hr class="col-12" />
				<h4 class="col-12 text-center text-success mb-3">Hot deals</h4>
				<div class="owl-carousel owl-theme col-sm-12 text-center">
				
					@foreach($hot_deals as $element)
						<form class="form-item">
						{{csrf_field()}}
							<div class="card-deck">
							  <div class="card">
								<a href="/p/{{$element->id}}">
									<img class="card-img-top img-fluid" src="/storage/{{$element->firstimage->path}}" alt="{{$element->name}}">
								</a>	
								<div class="card-body">
								  <h5 class="card-title text-success text-bold">{{$element->name}}</h5>
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
		</section><!--content center-->
	@endsection