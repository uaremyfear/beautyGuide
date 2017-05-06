	@extends('admin.layout')

	@section('content')

	<section class="content-header">
		<h1>
			Product 
			<small>create</small>
		</h1>
	</section>

	<section class="content">
		<div class="row" id="app">
			<div class="col-md-12">
				<form class="form" role="form" method="POST" action="{{ url('gotg/banner') }}" enctype="multipart/form-data">

					{{ csrf_field() }}

					<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
						<div class="form-group">
							<label class="control-label">New Banner Image
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
	
	@endsection()