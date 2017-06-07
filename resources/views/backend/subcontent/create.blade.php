@extends('admin.layout')

@section('content')
<section class="container">
	<div class="row">
		<div class="col-md-12">
			<h4>
				<i>Main Title</i> - <b> {{$post->title}} </b>
			</h4>
		</div>
		<div class="col-md-12">
			<table class="table table-striped">
				<tr>
					<th>Priority</th>
					<th>Sub-content Title</th>
					<th></th>
				</tr>
				@foreach ($post->subContents()->orderBy('priority')->get() as $subcontent)
				<tr>
					<td class="col-md-1">{{$subcontent->priority}}</td>
					<td class="col-md-9">{{$subcontent->title}}</td>
					<td class="col-md-2">
						<form class="form" role="form" method="POST" action="{{ url('/starwars/article/'. $post->id .'/subcontent/'. $subcontent->id) }}">
							<input type="hidden" name="_method" value="delete">
							{{ csrf_field() }}

							<input class="btn btn-danger" Onclick="return ConfirmDelete();" type="submit" value="Delete">
						</form>
					</td>
				</tr>
				@endforeach
			</table>	
		</div>
	</div>
</section>

<section class="content-header">
	<h1>
		Subcontent
		<small>create</small>
	</h1>
</section>

<section class="content">
	<div class="row">

		<div class="col-md-12">
			<form class="form" role="form" method="POST" action="{{ url('starwars/article/'.$post->id.'/subcontent') }}" enctype="multipart/form-data">

				{{ csrf_field() }}

				<input type="hidden" name="post_id" value="{{$post->id}}">
				<!-- title Form Input -->

				<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">

					<label class="control-label">Title</label>

					<input type="text" class="form-control" name="title" value="{{ old('title') }}">

					@if ($errors->has('title'))

					<span class="help-block">
						<strong>{{ $errors->first('title') }}</strong>
					</span>

					@endif

				</div>

				<div class="form-gruop">
					<label for="priority">Priority</label>					
					<select name="priority" class='form-control'>
						<option value="5">5</option>
						<option value="4">4</option>
						<option value="3">3</option>
						<option value="2">2</option>
						<option value="1">1</option>
					</select>	
				</div>
				<br>


				<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

					<label class="control-label">Description</label>

					<textarea class="form-control" name="description" rows="10"> {{ old('description') }} </textarea>

					@if ( $errors->has('description'))

					<span class="help-block">
						<strong>{{ $errors->first('description') }}</strong>
					</span>

					@endif
				</div>
				<br>

				<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
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
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-lg">
						Create
					</button>
				</div>
			</form>
		</div>
	</div>
</section>		
@endsection

@section('footer_js')
	<script>
	function ConfirmDelete()
	{
		var x = confirm("Are you sure you want to delete?");
		if (x)
			return true;
		else
			return false;
	}
</script>

@endsection