@extends('admin.layout')

@section('content')

<section class="content-header">
	<h1>
		Sub Category
		<small>create</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form class="form" role="form" method="POST" action="{{ url('gotg/subcategory') }}">

				{{ csrf_field() }}

				<!-- sub_name Form Input -->
				
				<div class="form-group{{ $errors->has('sub_name') ? ' has-error' : '' }}">

					<label class="control-label">Sub Category Name</label>

					<input type="text" class="form-control" name="sub_name" value="{{ old('sub_name') }}">

					@if ($errors->has('sub_name'))

					<span class="help-block">
						<strong>{{ $errors->first('sub_name') }}</strong>
					</span>

					@endif

				</div>

				<!-- Category Form Input -->

				<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
					<label class="control-label">Category</label>
					<select class="form-control" id="category_id" name="category_id">
						{{-- <option value="{{old('category_id')}}">
							{{ ! is_null(old('category_id')) ?
							(old('category_id') == 1 ? 'Yes' :'No')
							: 'Please Choose One'}}
						</option> --}}
						<option value= "" >Please Choose One</option>
						@foreach ($categories as $category)
							<option value= "{{$category->id}}" >{{$category->category_name}}</option>
						@endforeach

					</select>

					@if ($errors->has('category_id'))
					<span class="help-block">
						<strong>{{ $errors->first('category_id') }}</strong>
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