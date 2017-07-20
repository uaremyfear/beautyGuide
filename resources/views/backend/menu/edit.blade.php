@extends('layouts.admin')
@section('content')

<div class="box-header">
	<h3 class="box-title">Post Create</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
	<form class="form" role="form" method="POST" action="{{ url('starwars/menu/'.$menu->id) }}">
		<input type="hidden" name="_method" value="patch">
		{{ csrf_field() }}
		<div class="form-group{{ $errors->has('menu_name') ? ' has-error' : '' }}">				
			<label class="control-label">Menu Name</label>

			<input type="text" class="form-control" name="menu_name" value="{{ $menu->menu_name }}">

			@if ($errors->has('menu_name'))

			<span class="help-block">
				<strong>{{ $errors->first('menu_name') }}</strong>
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

@endsection