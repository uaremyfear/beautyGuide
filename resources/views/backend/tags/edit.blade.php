@extends('layouts.admin')
@section('content')

<div class="box-header">
	<h3 class="box-title">Tag Edit</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
	<form class="form" role="form" method="POST" action="{{ url('starwars/tag/'.$tag->id) }}">
		<input type="hidden" name="_method" value="patch">
		{{ csrf_field() }}
		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">				
			<label class="control-label">Tag Name</label>

			<input type="text" class="form-control" name="name" value="{{ $tag->name }}">

			@if ($errors->has('name'))

			<span class="help-block">
				<strong>{{ $errors->first('name') }}</strong>
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