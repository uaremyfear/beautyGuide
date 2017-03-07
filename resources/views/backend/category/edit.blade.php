@extends('admin.layout')

@section('content')

<section class="content-header">
	<h1>
		Category
		<small>Edit</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form class="form" role="form" method="POST" action="{{ url('/gotg/category/'. $category->id) }}">
				<input type="hidden" name="_method" value="patch">
				{{ csrf_field() }}

				<!-- category_name Form Input -->
				<div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
				<label class="control-label">Category Name</label>

				<input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}">

					@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('category_name') }}</strong>
					</span>
					@endif

				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-lg">
						Update
					</button>
				</div>

			</form>
		</div>
	</div>
</section>
@endsection