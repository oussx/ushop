@extends("master")

@section('title')
		{{$prod->name}} - uShop
@endsection
	
@section('content')
		<section class="container row mt-2">

			<form class="form-item">
			{{csrf_field()}}
				<div class="col-4 col-md-4 col-sm-4">
					<img  class="" src="/storage/{{$prod->firstimage->path}}" alt="{{$prod->name}}"/>
					<div class="col-12 col-md-12 col-sm-4 pl-0">
						<button type="submit" class="btn btn-warning w-45 mt-2 mb-2">ADD TO CART</button>
						<button type="button" class="btn btn-success w-45 mt-2 mb-2">BUY NOW</button>
					</div>
				</div>
				<input type="hidden" name="id" value ="{{$prod->id}}"></input>
				<input type="hidden" name="name" value ="{{$prod->name}}"></input>
				<input type="hidden" name="price" value ="{{$prod->price}}"></input>
				<input type="hidden" name="qty" value ="1"></input>
			</form>	
			<div class="col-4 col-md-4 col-sm-4">
				<h4>{{$prod->name}}</h4>
				<b>price: </b><span class="text-info text-strong">${{$prod->price}}</span>
				<br />
				<b>Description:</b>
				<p>{{$prod->description}}</p>
			</div>
			
			<div class="col-4 col-md-4 col-sm-4">
				<h4>{{$prod->name}}</h4>
				<b>price: </b><span class="text-info text-strong">${{$prod->price}}</span>
				<br />
				<b>Description:</b>
				<p>{{$prod->description}}</p>
			</div>
			
		</section><!--content center-->
		
		<section class="container-fluid mt-2 text-center">
		<hr />
			<div class="container-fluid text-center">
				<h4 class="mb-3">You may also be interested in</h4>
				<section class="row">
					<div class=col-md-12">
					
					<div id="recomCarousel" class="carousel slide" data-ride="carousel">
					  <div class="carousel-inner">
						<div class="carousel-item active">
							<div class="row mx-auto">
							@foreach($similar_prod as $element)
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
										<input type="hidden" name="id" value ="{{$element->id}}"></input>
										<input type="hidden" name="name" value ="{{$element->name}}"></input>
										<input type="hidden" name="price" value ="{{$element->price}}"></input>
										<input type="hidden" name="qty" value ="1"></input>
									  </div>
									</div>
								</form>
							@endforeach
							</div>		
						</div>
					
					<div class="carousel-item">
						<div class="row mx-auto">
						 @foreach($similar_prod as $element)
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
									  <input type="hidden" name="id" value ="{{$element->id}}"></input>
									  <input type="hidden" name="name" value ="{{$element->name}}"></input>
									  <input type="hidden" name="price" value ="{{$element->price}}"></input>
									  <input type="hidden" name="qty" value ="1"></input>
								</div>
							</form>	
						 @endforeach
						</div>
					</div>	
				  </div>
							  <a class="carousel-control-prev" href="#recomCarousel" role="button" data-slide="prev" style="top:0%">
						<span>
							<img src="/images/left-arrow.png" />
						</span>
						
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#recomCarousel" role="button" data-slide="next">
						<span>
							<img src="/images/right-arrow.png" />
						</span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				</div>
				</section>
			</div>
		</section><!--content similar-->
		
@endsection