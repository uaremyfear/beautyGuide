
@extends('layouts.frontendLayout')

@section('content')

<div class="jumbotron  js--add-gradient" style="backgournd-image:{{ asset('/images/backgourd_dark.jpg')}}">
	<div class="container">
		<div class="jumbotron__container">
			<h2 class="jumbotron__subtitle">
				Awesome oppurtunity to get cutural products
			</h2>
			<h1 class="jumbotron__title">
				Souvenir of Myanmar
			</h1>
			
			<a class="btn  btn-jumbotron" href="{{ url('/shop') }}">Browse Items</a>
		</div>
	</div>
</div>
<div class="banners  push-down-30">
	<div class="container">
		<div class="row">
			<div class="col-xs-12  col-sm-6  col-md-3">
				<div class="banners-box">
					<span class="glyphicon glyphicon-earphone glyphicon--banners"></span>
					<b class="banners__title">CALL US ANYTIME</b>
					+09 795583764
				</div>
			</div>
			<div class="col-xs-12  col-sm-6  col-md-3">
				<div class="banners-box">
					<span class="glyphicon glyphicon-road glyphicon--banners"></span>
					<b class="banners__title">DELIVERY</b>
					Depends on Township
				</div>
			</div>
			<div class="col-xs-12  col-sm-6  col-md-3">
				<div class="banners-box">
					<span class="glyphicon glyphicon-credit-card glyphicon--banners"></span>
					<b class="banners__title">PAYMENT METHODS</b>
					Cash on Delivery
				</div>
			</div>
			<div class="col-xs-12  col-sm-6  col-md-3">
				<div class="banners-box">
					<span class="glyphicon glyphicon-leaf glyphicon--banners"></span>
					<b class="banners__title">MADE WITH LOVE</b>
					For our nature
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<!-- Navigation for products -->
	<div class="products-navigation  push-down-15">
		<div class="row">
			<div class="col-xs-12  col-sm-8">
				<div class="products-navigation__title">
					<h3><span class="light">Latest</span> From Dar DoePyi</h3>
				</div>
			</div>
			<div class="col-xs-12  col-sm-4">
				<div class="products-navigation__arrows">
					<a href="#js--latest-products-carousel" data-slide="prev"><span class="glyphicon  glyphicon-chevron-left  glyphicon-circle  products-navigation__arrow"></span></a>&nbsp;
					<a href="#js--latest-products-carousel" data-slide="next"><span class="glyphicon  glyphicon-chevron-right  glyphicon-circle  products-navigation__arrow"></span></a>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->
	<div id="js--latest-products-carousel" class="carousel slide" data-ride="carousel" data-interval="5000">
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<div class="row">


					@foreach( $products as $key => $product )					
					@if($key<4)
					<div class="col-xs-12 col-sm-3  js--isotope-target  js--cat-5" data-price="2.73" data-rating="5">
						<div class="products__single">
							<figure class="products__image">
								<a href="{{ url('/product/'.$product->id) }}">
									<img alt="#" class="product__image" 
									style="width:100%;height:250px;" 
									width="263px" height="334px" src="{{ $product->picture()->first()->showImage($product->picture()->first(), $destinationFolder) }}">
								</a>
								
								<div class="product-overlay">
									<a class="product-overlay__more" href="{{ url('/product/'.$product->id) }}">
										<span class="glyphicon glyphicon-search"></span>
									</a>
								</div>
							</figure>
							<div class="row">
								<div class="col-xs-8">
									<h5 class="products__title">
										<a class="products__link  js--isotope-title" href="{{ url('/product/'.$product->id) }}">{{$product->name}}</a>
									</h5>
								</div>
								<div class="col-xs-4">
									<div class="products__price">
										{{$product->price}} Ks 
									</div>
								</div>
							</div>
							
							<div class="products__category">
								{{$product->subcategory()->first()->sub_name}}
							</div>

						</div>
						
					</div>

					@endif
					@endforeach
				</div>
			</div>
			<div class="item">
				<div class="row">

					@foreach( $products as $key => $product )
					@if($key>3)
					<div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-6" data-price="16.88" data-rating="4">
						<div class="products__single">
							<figure class="products__image">
								<a href="{{ url('/product/'.$product->id) }}">
									<img alt="#" class="product__image" style="width:263px;height:263px;" src="{{ $product->picture()->first()->showImage($product->picture()->first(), $destinationFolder) }}">
								</a>
								<div class="product-overlay">
									<a class="product-overlay__more" href="{{ url('/product/'.$product->id) }}">
										<span class="glyphicon glyphicon-search"></span>
									</a>
								</div>
							</figure>
							<div class="row">
								<div class="col-xs-8">
									<h5 class="products__title">
										<a class="products__link  js--isotope-title" href="{{ url('/product/'.$product->id) }}">{{$product->name}}</a>
									</h5>
								</div>
								<div class="col-xs-4">
									<div class="products__price">
										{{$product->price}} Ks
									</div>
								</div>
							</div>
							<div class="products__category">
								{{$product->subcategory()->first()->sub_name}}
							</div>
						</div>
					</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<!-- Banners medium -->
	{{-- <div class="row">
		<div class="col-xs-12 col-sm-6">
			<a href="shop.html">
				<div class="banners--medium">
					<span class="banners-text">New arrivals in <strong>Dress &amp; Beauty</strong> category</span>
					<span class="glyphicon  glyphicon-circle  glyphicon-chevron-right"></span>
				</div>
			</a>
		</div>
		<div class="col-xs-12 col-sm-6">
			<a href="shop.html">
				<div class="banners--medium">
					<span class="banners-text">Up to 35% off in <strong>Traditional</strong> category</span>
					<span class="glyphicon  glyphicon-circle  glyphicon-chevron-right"></span>
				</div>
			</a>
		</div>
	</div> --}}
	<!-- Navigation -->
	<div class="products-navigation  push-down-15">
		<div class="products-navigation__title">
			<h3><span class="light">Featured</span> Items</h3>
		</div>
	</div>

	<!-- Products -->
	<div class="row">
		@foreach( $feature_products as $product )

		<div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-5" data-price="2.73" data-rating="5">
			<div class="products__single">
				<figure class="products__image">
					<a href="{{ url('/product/'.$product->id) }}">
						<img alt="#" class="product__image" 
						style="width:263px;height:263px;" 
						width="263px" height="334px" src="{{ $product->picture()->first()->showImage($product->picture()->first(), $destinationFolder) }}">
					</a>
					<div class="product-overlay">
						<a class="product-overlay__more" href="{{ url('/product/'.$product->id) }}">
							<span class="glyphicon glyphicon-search"></span>
						</a>						
					</div>
				</figure>
				<div class="row">
					<div class="col-xs-8">
						<h5 class="products__title">
							<a class="products__link  js--isotope-title" href="{{ url('/product/'.$product->id) }}">{{$product->name}}</a>
						</h5>
					</div>
					<div class="col-xs-4">
						<div class="products__price">
							{{$product->price}} Ks
						</div>
					</div>
				</div>
				<div class="products__category">
					{{$product->subcategory()->first()->sub_name}}
				</div>
			</div>
		</div>

		@endforeach
	</div>

	
	<!-- Navigation -->
	<div class="products-navigation  push-down-15">
		<div class="products-navigation__title">
			<h3><span class="light">Best Seller</span> Items</h3>
		</div>
	</div>

	<!-- Products -->
	
	<div class="row">
		@foreach( $best_sellers as $product )

		<div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-5" data-price="2.73" data-rating="5">
			<div class="products__single">
				<figure class="products__image">
					<a href="{{ url('/product/'.$product->id) }}">
						<img alt="#" class="product__image" 
						style="width:263px;height:263px;" 
						width="263px" height="334px" src="{{ $product->picture()->first()->showImage($product->picture()->first(), $destinationFolder) }}">
					</a>
					<div class="product-overlay">
						<a class="product-overlay__more" href="{{ url('/product/'.$product->id) }}">
							<span class="glyphicon glyphicon-search"></span>
						</a>						
					</div>
				</figure>
				<div class="row">
					<div class="col-xs-8">
						<h5 class="products__title">
							<a class="products__link  js--isotope-title" href="{{ url('/product/'.$product->id) }}">{{$product->name}}</a>
						</h5>
					</div>
					<div class="col-xs-4">
						<div class="products__price">
							{{$product->price}} Ks
						</div>
					</div>
				</div>
				<div class="products__category">
					{{$product->subcategory()->first()->sub_name}}
				</div>
			</div>
		</div>

		@endforeach
	</div>

	<!-- Banners big -->
	{{-- <div class="banners--big  banners--big-left">
		<div class="row">
			<div class="col-xs-12  col-md-7">
				<div class="banners--big__text">
					Newsletter for more information about <strong>DarDoe Pyi</strong>
				</div>
			</div>
			<div class="col-xs-12  col-md-5">
				<div class="banners--big__form">
					<form action="//proteusthemes.us4.list-manage.com/subscribe/post?u=ea0786485977f5ec8c9283d5c&amp;id=5dad3f35e9" method="post" name="mc-embedded-subscribe-form" role="form" target="_blank">
						<div class="form-group  form-group--form">
							<input type="email" name="EMAIL" class="form-control  form-control--form" placeholder="Enter your E-mail address" required>
							<button class="btn  btn-primary" type="submit">Sign up now</button>
						</div>
						<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						<div style="position: absolute; left: -5000px;"><input type="text" name="b_ea0786485977f5ec8c9283d5c_5dad3f35e9" value=""></div>
					</form>
				</div>
			</div>
		</div>
	</div>	
</div>
<div class="testimonials  light-paper-pattern">
	<div class="container">
		<div class="row">
			<div class="col-sm-3  hidden-xs">
				<div class="testimonials__quotes">
					<img alt="#" class="testimonials__quotes--img" src="images/quotes.png">
				</div>
			</div>
			<div class="col-xs-12  col-sm-6">
				<a href="#js--testimonails-carousel" data-slide="prev"><span class="glyphicon  glyphicon-circle  glyphicon-chevron-left"></span></a>
				<h4 class="testimonials__title"><span class="light">Others</span> About Us</h4>
				<a href="#js--testimonails-carousel" data-slide="next"><span class="glyphicon  glyphicon-circle  glyphicon-chevron-right"></span></a>
				<hr class="divider-dark">
				<div id="js--testimonails-carousel" class="carousel  slide" data-ride="carousel" data-interval="5000">
					<div class="carousel-inner">
						<div class="item  active">
							<q class="testimonials__text">A top quality product delivered super quick! Thank you so much Organic Shop,<br>I shall definitely be using you guys again!</q><br><br>
							<cite><b>John Don Joe,</b></cite> Musician
						</div>
						<div class="item">
							<q class="testimonials__text">THANKS! I really appreciate the FAST service of Proteus! Really Really Happy with the theme and support! Thanks again.</q><br><br>
							<cite><b>Timonvki,</b></cite> Themeforest user
						</div>
						<div class="item">
							<q class="testimonials__text">Great theme, perfect for any salon. Client loves it. Very good documentation and easy to use and setup.</q><br><br>
							<cite><b>Ypclarke,</b></cite> Themeforest user
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3  hidden-xs">
				<div class="testimonials__quotes--rotate">
					<img alt="#" class="testimonials__quotes--img" src="images/quotes.png">
				</div>
			</div>
		</div>
	</div>--}}
</div> 

@endsection
