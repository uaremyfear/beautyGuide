@extends('admin.layout')

@section('content')

<section class="content-header">
	<h1>
		Product 
		<small>create</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form class="form" role="form" method="POST" action="{{ url('gotg/product') }}" enctype="multipart/form-data">

				{{ csrf_field() }}

				<!-- name Form Input -->
				
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

					<label class="control-label">Product Name</label>

					<input type="text" class="form-control" name="name" value="{{ old('name') }}">

					@if ($errors->has('name'))

					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>

					@endif

				</div>

				<!-- description Form Input -->
				
				<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

					<label class="control-label">Product Description</label>

					<textarea class="form-control" name="description" value="{{ old('description') }}"></textarea>

					@if ($errors->has('description'))

					<span class="help-block">
						<strong>{{ $errors->first('description') }}</strong>
					</span>

					@endif

				</div>

				<!-- Sub Category Form Input -->

				<div class="form-group{{ $errors->has('sub_category_id') ? ' has-error' : '' }}">
					<label class="control-label">Sub Category Name</label>
					<select class="form-control" id="sub_category_id" name="sub_category_id">
						{{-- <option value="{{old('category_id')}}">
							{{ ! is_null(old('category_id')) ?
							(old('category_id') == 1 ? 'Yes' :'No')
							: 'Please Choose One'}}
						</option> --}}
						<option value= "" >Please Choose One</option>
						@foreach ($sub_categories as $sub_category)
						<option value= "{{$sub_category->id}}" >{{$sub_category->sub_name}}</option>
						@endforeach

					</select>

					@if ($errors->has('sub_category_id'))
					<span class="help-block">
						<strong>{{ $errors->first('sub_category_id') }}</strong>
					</span>
					@endif
				</div>
				
				<!-- Image Form Input -->

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