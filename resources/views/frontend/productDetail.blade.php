@extends('layouts.frontendLayout')

@section('content')

<div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<nav>
					<ol class="breadcrumb">
						<li><a href="{{ url('/') }}">Home</a></li>

						<li><a href="{{ url('/shop') }}">Shop</a></li>
						
						<li class="active">{{$product->name}}</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="push-down-30">
		<div class="row">
			<div class="col-xs-12 col-sm-4">
				<div class="product-preview">
					<div class="push-down-20">
						<img class="js--product-preview" alt="Single product image" src="{{ $product->picture()->first()->showImage($product->picture()->first(), $destinationFolder) }}" style="width:360px;height:360px;">
					</div>                
				</div>
			</div>
			<div class="col-xs-12 col-sm-8">
				<div class="products__content">
					<div class="push-down-30"></div>

					<span class="products__category">{{$product->subcategory()->first()->sub_name}}</span>
					<h1 class="single-product__title"> {{$product->name}} </h1>
					<span class="single-product__price">{{$product->price}} Ks</span>
					
					<div class="in-stock--single-product">
						<span class="in-stock">&bull;</span> <span class="in-stock--text">In stock</span>
					</div>
					<hr class="bold__divider">
					<p class="single-product__text">
						{{$product->description}}
					</p>
					<hr class="bold__divider">
					<!-- Single button -->

					<!-- Social banners -->
					<div class="row">
						<div class="col-xs-12  col-sm-6  col-md-4">
							<div class="banners--small fb-share-button banners--small--social"
								data-href="http://www.dardoepyi.com/product/6" 
								data-layout="button_count"
							>
							<a href="#" class="social"><span class="zocial-facebook"></span>
								Share on<br>
								<span class="banners--small--text">Facebook</span>
							</a>
							</div>
					</div>
					<div class="col-xs-12 col-sm-6  col-md-4">
						<div class="banners--small  banners--small--social">
							<a href="#" class="social"><span class="zocial-twitter"></span>
								Tweet it<br>
								<span class="banners--small--text">Twitter</span>
							</a>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Navigation -->
<div class="push-down-30">
	<div class="products-navigation">
		<div class="products-navigation__title">
			<h3><span class="light">Related</span> Products</h3>
		</div>
	</div>
</div>

<!-- Products -->
<div class="push-down-30">
	<div class="row">
		@foreach ( $products as $product)
		<div class="col-xs-6 col-sm-3  js--isotope-target  js--cat-6" data-price="{{$product->price}}" data-rating="4">
			<div class="products__single">
				<figure class="products__image">
					<a href="{{ url('/product/'.$product->id) }}">
						<img alt="#" class="product__image" width="263" height="334" style="width:263px;height:280px;" src="{{ $product->picture()->first()->showImage($product->picture()->first(), $destinationFolder) }}">
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

		<div class="clearfix visible-xs"></div> 

	</div>
</div>
</div>

@endsection