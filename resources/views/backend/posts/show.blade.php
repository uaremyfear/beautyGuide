@extends('layouts.admin')

@section('header-links')
<link rel="stylesheet" href="{{ asset('lte/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('content')


<div class="box-header">
	<h3 class="box-title">{{$post->title}}</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
	<div class="row">		
		<div class="col-md-9">
			@if ($post->menus()->first())
			<div class="col-md-6">
				<i>Menu - </i>				
				<span> {{$post->menus()->first()->menu_name}} </span>							
			</div>
			@endif

			<div class="col-md-6">
				<i>Tags - </i>
				@foreach ($post->tags()->get() as $tag)
				<span> {{$tag->name}} </span>,	
				@endforeach			
			</div>	

			@if ($post->categories()->first())
			<div class="col-md-6">
				<i>Category - </i>
				@foreach ($post->categories()->get() as $category)
				<span> {{$category->category_name}} </span>,	
				@endforeach			
			</div>
			@endif

					

			<div class="col-md-6">
				<i>Author - </i>
				<span> {{$post->author->name}} </span>
			</div>					
		</div>
		
		<div class="col-md-2">			
			<a href="/starwars/post/{{$post->id}}/edit"><input class="btn btn-success" value="Edit"></a>
		</div>

		@if ($post->picture()->first())
		<div class="col-md-12">
			<img alt="Single product image" src="{{ $post->picture()->first()->showImage($post->picture()->first(), $destinationFolder) }}" style="margin-top:15px;padding-bottom:15px">			
		</div>
		<hr>
		@endif
		<div class="col-md-12">
			<p>{!!$post->content!!}</p>
		</div>
		
		
	</div>
</div>

@endsection