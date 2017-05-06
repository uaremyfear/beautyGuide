@extends('layouts.frontendLayout')

@section('content')

<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<nav>
					<ol class="breadcrumb">
						<li><a href="{{ url('/') }}">Home</a></li>

						<li class="active">Contact</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>

{{-- <div class="simple-map  js--where-we-are" data-latlng="46.049467,14.460506" data-markers="[{lat: 46.049467,lng: 14.460506,title: 'ProteusThemes Ljubljana'},{lat: 46.020569,lng: 15.476118,title: 'ProteusThemes Senovo'}]" data-zoom="6"></div> --}}

<div id="map" class="simple-map"></div>

<div class="container  push-down-30">
	<div class="row">
		<div class="col-xs-12">
			<h1 class="center"><span class="light">Send</span> Us an Message</h1>
			<hr class="divider">
			<div class="text-shrink">
				<p class="text-highlight">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate, leo vel malesuada tincidunt, purus nunc tristique erat, at elementum tellus mi nec mi. Nunc rutrum ullamcorper blandit.</p>
			</div>
			<hr class="divider  divider-about">
			<div class="push-down-30"></div>
			<div class="row">
				<div class="col-xs-12 col-sm-9  push-down-30">
					<form validate>
						<div class="row">
							<div class="col-xs-12  col-sm-4">
								<div class="form-group">
									<label class="text-dark" for="name">Name <span class="warning">*</span></label>
									<input type="text" id="name" class="form-control  form-control--contact" required>
								</div>
								<div class="form-group">
									<label class="text-dark" for="email">E-mail <span class="warning">*</span></label>
									<input type="text" id="email" class="form-control  form-control--contact" required>
								</div>
								<div class="form-group">
									<label class="text-dark" for="subject">Subject <span class="warning">*</span></label>
									<input type="text" id="subject" class="form-control  form-control--contact" required>
								</div>
								<span class="hidden-xs">Fields marked with <span class="warning">*</span> are obligatory</span>
							</div>
							<div class="col-xs-12  col-sm-8">
								<div class="form-group">
									<label class="text-dark" for="message">Message <span class="warning">*</span></label>
									<textarea class="form-control  form-control--contact  form-control--big" id="message" rows="12" required></textarea>
								</div>
								<div class="right">
									<button type="submit" class="btn  btn-warning">Send now</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-xs-12 col-sm-3">
					<h2  class="no-margin"><span class="light">Dar </span>Doepyi</h2><br/>
					<p><strong>အမွတ္ ၆/၁၊<br>
						သံသုမာလမ္းမၾကီး၊<br>
						၂၄ရပ္ကြက္၊ သု၀ဏ</strong></p>
						<span class="glyphicon  glyphicon-earphone"></span> <span class="text-dark">09 44 800 8000</span><br>
						<span class="glyphicon  glyphicon-envelope"></span> <a class="secondary-link" href="mailto:hello@dardoepyi.com"><strong>info@dardoepyi.com</strong></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	@endsection

	@section('footer-script')
	<script>
		function initMap() {
			var uluru = {lat: 16.8213, lng: 96.1869};
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 14,
				center: uluru
			});
			var marker = new google.maps.Marker({
				position: uluru,
				map: map
			});
		}
	</script>
	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqNVXOiogmvJ1dWHTUXG2AsHrEYEjKD2Y&callback=initMap">
	</script>
@endsection

