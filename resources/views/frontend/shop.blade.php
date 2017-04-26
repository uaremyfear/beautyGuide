@extends('layouts.frontendLayout')

@section('content')

<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<nav>
					<ol class="breadcrumb">
						<li><a href="{{ url('/') }}">Home</a></li>

						<li class="active">Shop</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<!-- Big banner -->
	<div class="row">
		<div class="col-xs-12">
			<div class="push-down-30">
				<div class="banners--big">
					Exposed shop notice, like <strong>free worldwide</strong> shipping on all purchases 
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12  col-sm-3">
			<aside class="sidebar  sidebar--shop">
				<h3 class="sidebar__title"><span class="light">Souveniur</span> Shop</h3>
				<hr class="shop__divider">
				<div class="shop-filter">

					<h5 class="sidebar__subtitle">Categories</h5>
					<ul class="nav  nav--filter">						
						@foreach ($categories as $category)
						<li><a data-target=".{{$category->category_name}}" class="js--filter-selectable" href="#">{{$category->category_name}}</a></li>
						@endforeach

						<li><a data-target="{{$category->category_name}}" class="js--filter-selectable" href="#">{{$category->category_name}}</a></li>
					</ul>

					<hr class="divider">
					{{-- <h5 class="sidebar__subtitle">Price</h5>
					<div class="shop__filter__slider">
						<div class="js--jqueryui-price-filter"></div>
					</div>
					<hr class="divider"> --}}
					<div class="shop__sort-filter">
						<select class="js--isotope-sorting  btn  btn-shop">
							<option value='{"sortBy":"price", "sortAscending":"true"}'>By Price (Low to High) &uarr;</option>
							<option value='{"sortBy":"price", "sortAscending":"false"}'>By Price (High to Low) &darr;</option>
							<option value='{"sortBy":"name", "sortAscending":"true"}'>By Name (Low to High) &uarr;</option>
							<option value='{"sortBy":"name", "sortAscending":"false"}'>By Name (High to Low) &darr;</option>
						</select>
					</div>

					

					<hr class="shop__divider">
				</div>
			</aside>
		</div>
		<div class="col-xs-12  col-sm-9">
			<div class="grid">
				
				<div class="row  js--isotope-container">

					@foreach ($products as $product)
					{{-- expr --}}
					
					<div class="col-xs-12 col-sm-4  js--isotope-target  {{$product->category()->first()->category_name}}" data-price="{{$product->price}}" data-rating="5">
						<div class="products__single">
							<figure class="products__image">
								<a href="{{ url('product/'.$product->id) }}">
									<img alt="#" class="product__image" style="width:100%;height:263px;" src="{{ $product->picture()->first()->showImage($product->picture()->first(), $destinationFolder) }}">
								</a>
								<div class="product-overlay">
									<a class="product-overlay__more" href="{{ url('product/'.$product->id) }}">
										<span class="glyphicon glyphicon-search"></span>
									</a>									
								</div>
							</figure>
							<div class="row">
								<div class="col-xs-7">
									<h5 class="products__title">
										<a class="products__link  js--isotope-title" href="{{ url('product/'.$product->id) }}">{{$product->name}}</a>
									</h5>
								</div>
								<div class="col-xs-5">
									<div class="products__price">
										{{$product->price}} Ks
									</div>
								</div>
							</div>
							<div class="products__category">
								{{$product->category()->first()->category_name}}
							</div>
						</div>
					</div>
					
					@endforeach

					<div class="clearfix  hidden-xs"></div>
				</div>
				{{-- <hr class="shop__divider">
				<div class="shop__pagination">
					<ul class="pagination">
						<li><a class="pagination--nav" href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
						<li><a href="#">1</a></li>
						<li><a class="active" href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a class="pagination--nav" href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
					</ul>
				</div> --}}
			</div>
		</div>
	</div>
</div>

@endsection
