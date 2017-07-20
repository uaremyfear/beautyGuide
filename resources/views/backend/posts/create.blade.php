@extends('layouts.admin')

@section('header-links')
<style>
	.select2-container--default .select2-selection--multiple .select2-selection__choice {
		background-color: #3c8dbc;
		border-color: #367fa9;
		padding: 1px 10px;
	}
</style>
@endsection

@section('content')

<div class="box-header">
	<h3 class="box-title">Post Create</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
	<form class="form" role="form" method="POST" action="{{ url('starwars/post/createFirstStep') }}">
		{{ csrf_field() }}

		<div class="form-group">
			<label class="control-label" for="title">Blog Title</label>
			<br>
			@if($errors->has('title'))
			<label class="text-danger" for="title"><small>{{ $errors->first('title') }}</small></label>
			@endif
			<input class="form-control" type="text" name="title" value="{{ old('title') }}" />
		</div>


		<div class="form-group{{ $errors->has('prefix') ? ' has-error' : '' }}">

			<label class="control-label">Prefix</label>

			<input type="text" class="form-control" name="prefix" value="{{ old('prefix') }}">

			@if ($errors->has('prefix'))

			<span class="help-block">
				<strong>{{ $errors->first('prefix') }}</strong>
			</span>

			@endif
		</div>

		<div class="row">
			@if($errors->has('cat_menu'))
			<div class="form-group col-md-12">
				<label class="text-danger" for="title"><small>{{ $errors->first('cat_menu') }}</small></label>
			</div>
			@endif
			<div class="form-group  col-md-6 {{ $errors->has('cat_menu') ? ' has-error' : '' }}">
				<label for="tag">Category</label>
				{!! Form::select('id', $categories,null,['name'=>'category_id[]' , 'class'=>'form-control select2', 'multiple' => 'multiple' ,'id'=>'select2']) !!}	
			</div>

			<div class="form-group col-md-6 {{ $errors->has('cat_menu') ? 'has-error' : '' }}">
				<label for="tag">Menu</label>
				{!! Form::select('id', $menus,null,['name'=>'menu_id[]' , 'class'=>'form-control select2one','multiple' => 'multiple']) !!}	
			</div>
		</div>

		<div class="row">
			<div class="form-gruop col-md-6">
				<label for="tag">Tags</label>
				{!! Form::select('id', $tags,null,['name'=>'tag_id[]' , 'class'=>'form-control select-tag', 'multiple' => 'multiple']) !!}
				@if($errors->has('tag_id'))
				<label class="text-danger" for="tag_id"><small>{{ $errors->first('tag_id') }}</small></label>
				@endif	
			</div>

			<div class="form-gruop col-md-6">
				<label for="author">Author</label>
				{!! Form::select('id', $authors,null,['name'=>'author_id' , 'class'=>'form-control select2one','multiple' => 'multiple']) !!}
				@if($errors->has('author_id'))
				<label class="text-danger" for="author_id"><small>{{ $errors->first('author_id') }}</small></label>
				@endif	
			</div>
		</div>
		<br>

		{{-- <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
			<div class="form-group">
				<label class="control-label">Primary Image
				</label>
				<input type="file" name="image" id="image">
			</div>
			@if ($errors->has('image'))
			<span class="help-block">
				<strong>{{ $errors->first('image') }}</strong>
			</span>
			@endif
		</div> --}}

		<div class="form-gruop">
			<button type="submit" class="btn btn-primary">Next</button>
		</div>
	</form>
</div>

@stop

@section('footer-scripts')
<script type="text/javascript">
	$('.select-tag').select2({
		tags:true
	});
</script>
<script>
	$(function(){
      // turn the element to select2 select style
      $('#select2').select2();
  });
</script>
<script>
	$(function(){
		// turn the element to select2 select style
		$('#select2menu').select2();
	});
</script>
<script>
	$(function(){
	// turn the element to select2 select style
	$('.select2one').select2({
		maximumSelectionLength:1
	});
});
</script>
@endsection