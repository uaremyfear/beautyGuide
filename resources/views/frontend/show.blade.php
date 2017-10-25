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

			@include('frontend.rightbar')
		</div>
	</div>
</div>
</main>


@endsection