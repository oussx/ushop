 <div class="col-12">
	 <nav class="navbar  navbar-expand-sm navbar-light justify-content-between">
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
	   
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<form method="POST" class="form-inline my-2 my-lg-0" action="/search">
					{{ csrf_field() }}
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_text">
					<button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
				</form>
				<ul class="navbar-nav ml-auto small font-weight-bold navbar-right">
							<li><a id="cart-bo" class="nav-link" href="#" data-toggle="modal" data-target="#cart-box"><i class="far fa-cart-arrow-down"></i><span id="cart-info"> 0 </span></a> </li>
							@if (Auth::guest())
								<li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
								<li><a a class="nav-link" href="{{ route('register') }}">Register</a></li>
							@else
								<li class="dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
										{{ Auth::user()->name }} <span class="caret"></span>
									</a>

									<ul class="dropdown-menu" role="menu">
										<li>
											<a class="nav-link" href="{{ route('logout') }}"
												onclick="event.preventDefault();
														 document.getElementById('logout-form').submit();">
												Logout
											</a>

											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
											</form>
										</li>
									</ul>
								</li>
							@endif
				</ul>
			
			</div>
	</nav>
</div>

 <div class="col-12">
	 <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
	  <a class="navbar-brand" href="#">OussX</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navCategories" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	   
	   <div class="collapse navbar-collapse" id="navCategories">
			
		<ul class="navbar-nav mr-auto small font-weight-bold">
			<li class="nav-item active">
				<a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
			</li>
			@if(isset($categories))
				@foreach($categories as $cat)
				  <li class="nav-item">
					<a class="nav-link" href="/cat/{{ $cat->id }}">{{$cat->name}}</a>
				  </li>
				@endforeach
			@endif
		  <li class="nav-item">
			<a class="nav-link" href="/us">About us</a>
		  </li>
		</ul>
		
	  </div>
	</nav>
</div>

