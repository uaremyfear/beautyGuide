@extends('admin.layout')

@section('header_link')
	<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
	
@endsection

@section('content')

<section class="content-header">
	<h1>
		User
		<small>create</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form class="form" role="form" method="POST" action="{{ url('gotg/user') }}">

				{{ csrf_field() }}

				<!-- name Form Input -->
				
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

					<label class="control-label">Name</label>

					<input type="text" class="form-control" name="name" value="{{ old('name') }}">

					@if ($errors->has('name'))

					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>

					@endif

				</div>

				<!-- Email Form Input -->
				
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

					<label class="control-label">Email</label>

					<input type="text" class="form-control" name="email" value="{{ old('email') }}">

					@if ($errors->has('email'))

					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>

					@endif

				</div>

				<!-- Password Form Input -->
				
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

					<label class="control-label">Password</label>

					<input type="password" class="form-control" name="password">

					@if ($errors->has('password'))

					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>

					@endif

				</div>

				<!-- Confirm Form Input -->
				
				<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

					<label class="control-label">Password</label>

					<input type="password" class="form-control" name="password_confirmation">

					@if ($errors->has('password_confirmation'))

					<span class="help-block">
						<strong>{{ $errors->first('password_confirmation') }}</strong>
					</span>

					@endif

				</div>

				<div class="form-gruop">
					<div class="row">
						<div class="col-md-12">
							<label for="tag">User Role</label>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							@foreach ($roles as $role)					
							<div class="checkbox">
								<label><input type="checkbox" name="role[]" value="{{$role->id}}">{{$role->slug}} - "{{$role->description}}"</label>
							</div>
							@endforeach
						</div>
					</div>
				</div>

				</br>	
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
	<script src="{{ asset('js/select2.min.js') }}"></script>
	<script type="text/javascript">
  		$('select').select2();
	</script>
@endsection