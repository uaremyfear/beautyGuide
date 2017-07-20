@extends('layouts.admin')
@section('content')

<div class="box-header">
	<h3 class="box-title">Category Create</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
	<form class="form" role="form" method="POST" action="{{ url('starwars/category') }}">

		{{ csrf_field() }}

		<!-- category_name Form Input -->

		<div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">

			<label class="control-label">Category Name</label>

			<input type="text" class="form-control" name="category_name" value="{{ old('category_name') }}">

			@if ($errors->has('category_name'))

			<span class="help-block">
				<strong>{{ $errors->first('category_name') }}</strong>
			</span>

			@endif

		</div>

		<div class="form-gruop {{ $errors->has('menu_id') ? ' has-error' : '' }}">
			<label for="menu" class="control-label">Menu</label>
			{!! Form::select('id', $menus,null,['name'=>'menu_id' , 'class'=>'form-control', 'placeholder'=>'-- Choose Menu Name --']) !!}	

			@if ($errors->has('menu_id'))

			<span class="help-block">
				<strong>{{ $errors->first('menu_id') }}</strong>
			</span>

			@endif
		</div>

		<br>

		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-lg">
				Create
			</button>
		</div>
	</form>
</div>

@endsection