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

<div class="simple-map  js--where-we-are" data-latlng="46.049467,14.460506" data-markers="[{lat: 46.049467,lng: 14.460506,title: 'ProteusThemes Ljubljana'},{lat: 46.020569,lng: 15.476118,title: 'ProteusThemes Senovo'}]" data-zoom="6"></div>
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
					<h2  class="no-margin"><span class="light">Organique</span> Itd</h2><br/>
					<p><strong>Dunajska cesta 17,<br>
						1000 Ljubljana,<br>
						Slovenia, Europe</strong></p>
						<span class="glyphicon  glyphicon-earphone"></span> <span class="text-dark">00386 31 567 537</span><br>
						<span class="glyphicon  glyphicon-envelope"></span> <a class="secondary-link" href="mailto:hello@proteusnet.com"><strong>hello@proteusnet.com</strong></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	@endsection