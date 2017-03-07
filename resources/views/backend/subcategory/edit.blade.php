@extends('admin.layout')

@section('content')

<section class="content-header">
	<h1>
		Sub Category
		<small>Edit</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form class="form" role="form" method="POST" action="{{ url('/gotg/subcategory/'. $subcategory->id) }}">
				<input type="hidden" name="_method" value="patch">
				{{ csrf_field() }}

				<!-- sub_name Form Input -->
				<div class="form-group{{ $errors->has('sub_name') ? ' has-error' : '' }}">
				<label class="control-label">Sub Category Name</label>

				<input type="text" class="form-control" name="sub_name" value="{{ $subcategory->sub_name }}">

					@if ($errors->has('name'))
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
						<option value= "{{ $subcategory->category()->first()->id }}" >{{$subcategory->category}}</option>
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
						Update
					</button>
				</div>

			</form>
		</div>
	</div>
</section>
@endsection