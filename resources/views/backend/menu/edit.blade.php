@extends('admin.layout')

@section('content')

<section class="content-header">
	<h1>
		Menu
		<small>Edit</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
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
	</div>
</section>
@endsection