@extends("master")

@section('title')
		uShop - Products in ...at best prices
@endsection
	
@section('content')
		<section class="container-fluid">
			<div class="row mt-2">
				@if(sizeof($results)===0)
					<div class="col-md-12 font-weight-bold text-secondary text-center">
						<p class="text-dark">Sorry, no results found!</p>
						<p>please check the spelling or try searching for something else</p>
					</div>
				@else
					<div class="col-md-12 font-weight-bold text-secondary">
						<h3>{{sizeof($results)}} Results for"{{$searched_text}}"</h3>
						<hr />
					</div>
					@foreach($results as $prod)
						
						<div class="col-md-3 text-center">
							<a href="/p/{{$prod->id}}">
								<div>
									<img class="img-fluid mb-2 img-thumbnail" src="/storage/{{$prod->firstimage->path}}" alt="{{$prod->name}}"/>
								</div>
								<div class="col-md-12 font-weight-bold text-success">
									{{$prod->name}}
								</div>
								<div class="col-md-12 clipped-text text-secondary">
									{{$prod->description}}
								</div>
								<div class="col-md-12 font-weight-bold text-primary mb-3">
									${{$prod->price}}
								</div>
							</a>
						</div>
											
					@endforeach					
				@endif
			</div>
		</section>
@endsection