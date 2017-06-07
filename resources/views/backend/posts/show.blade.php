@extends('admin.layout')

@section('content')

<section class="content-header">
	<h1>
		{{$post->title}}
	</h1>
</section>

<section class="content">
	<div class="row">		
		<div class="col-md-9">
			@if ($post->menus()->first())
			<div class="col-md-12">
				<i>Menu - </i>				
				<span> {{$post->menus()->first()->menu_name}} </span>							
			</div>
			@endif

			@if ($post->categories()->first())
			<div class="col-md-12">
				<i>Category - </i>
				@foreach ($post->categories()->get() as $category)
				<span> {{$category->category_name}} </span>,	
				@endforeach			
			</div>
			@endif

			<div class="col-md-12">
				<i>Tags - </i>
				@foreach ($post->tags()->get() as $tag)
				<span> {{$tag->name}} </span>,	
				@endforeach			
			</div>
			<hr>

			<div class="col-md-12">
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
			<p>{{$post->body}}</p>
		</div>
		
		@if ($post->subContents()->first())
		@foreach ($post->subContents()->get() as $subContent)
		<div class="col-md-12">
			
			<h4>{{$subContent->priority }} . {{ $subContent->title}}</h4>
			
			@if ($subContent->picture()->first())
					<img alt="Single product image" src="{{ $subContent->picture()->first()->showImage($subContent->picture()->first(), '/images/subcontents/') }}" style="margin-top:15px;padding-bottom:15px">	
			@endif	
			
			<p>{{$subContent->description}}</p>
		
		</div>		
		@endforeach
		@endif		
	</div>
</section>		
@endsection