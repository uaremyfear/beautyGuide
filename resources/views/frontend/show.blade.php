@extends('layouts.frontendLayout')

@section('content')

<main>
	<div class="container">
		<div class="row wow fadeIn" data-wow-delay="0.2s">
			<div class="col-lg-8">
				<div class="mt-5">
					<h3 class="h3-responsive">{{$post->title}}</h3>
				</div>

				<hr>

				<img src="{{ asset('images/posts/' . $post->picture()->first()->image_name.'.'.$post->picture()->first()->image_extension) }}" style="width:100%;max-height:auto;" class="img-fluid " alt="">

				<div class="mt-5">
					{!! $post->content !!}
				</div>				
			</div>

			<div class="col-lg-4">
				<div class="row">
					<div class="col-md-12">
						<h3 class="h3-responsive">Latest News</h3>
					</div>
				</div>

				@foreach ($posts as $key => $post)

				<div class="wow fadeIn mt-3" data-wow-delay="0.2s">
					<!--/.Card-->
					<a href="{{ url('/latest/' . $post->id ) }}">
						<div class="card">
							<!--Card image-->
							<div class="view overlay hm-white-light z-depth-1-half">
								<img class="img-fluid" src="{{ asset('images/posts/' . $post->picture()->first()->image_name.'.'.$post->picture()->first()->image_extension) }}" alt="Card image cap">
								<div class="mask">
								</div>
							</div>
							<!--/.Card image-->

							<!--Card content-->
							<div class="card-body news-title">
								<!--Title-->
								<h4 class="card-text h4-responsive card-title card-news"><p>{{$post->title}}</p></h4>
								<!--Text-->                                
							</div>
							<!--/.Card content-->
						</div>
					</a>
				</div>

				@endforeach 
				
				<hr>

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
</div>
</main>


@endsection