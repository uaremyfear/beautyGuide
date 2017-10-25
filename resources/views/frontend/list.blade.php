@extends('layouts.frontendLayout')

@section('content')

<main>
	<div class="container">
		<div class="row wow fadeIn" data-wow-delay="0.2s">
			<div class="col-lg-9">
				@include('frontend.postList')
			</div>
			<div class="col-lg-3">
				<div class="row mt-3">
					<div class="col-md-12">
						<h3 class="h3-responsive">Follow Us</h3>
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-md-12">
						<!--Facebook-->
						<button type="button" class="btn btn-fb waves-effect waves-light">
							<i class="fa fa-facebook left"></i> Facebook
						</button>
						<!--Twitter-->

						<button type="button" class="btn btn-tw waves-effect waves-light">
							<i class="fa fa-twitter left"></i> Twitter
						</button>
						<!--Google +-->
						<button type="button" class="btn btn-gplus waves-effect waves-light">
							<i class="fa fa-google-plus left"></i> Google +
						</button>
						<!--Linkedin-->                                             
					</div>                    
				</div>

				<hr>

				<div class="row mt-4">
					<div class="col-md-12">
						<h3 class="h3-responsive">Tags</h3>
					</div>
				</div>

				<div class="row mt-2">
					<div class="col-md-12">
						@foreach ($tags as $tag)
						<a href="" class="btn btn-outline-primary waves-effect tags">{{ $tag->name }}</a> 
						@endforeach
					</div>                    
				</div>
			</div>
		</div>
	</div>
</main>


@endsection