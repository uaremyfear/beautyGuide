@extends('admin.layout')

@section('header_link')
	<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
	
@endsection

@section('content')

<section class="content-header">
	<h1>
		Place
		<small>create</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form class="form" role="form" method="POST" action="{{ url('gotg/delivery/'.$delivery->id) }}">
				<input type="hidden" name="_method" value="patch">
				{{ csrf_field() }}

				<!-- place Form Input -->
				
				<div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">

					<label class="control-label">Place</label>

					<input type="text" class="form-control" name="place" value="{{ $delivery->place }}">

					@if ($errors->has('place'))

					<span class="help-block">
						<strong>{{ $errors->first('place') }}</strong>
					</span>

					@endif

				</div>

				
				<!-- price Form Input -->
				
				<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">

					<label class="control-label">Price</label>

					<input type="text" class="form-control" name="price" value="{{ $delivery->price }}">

					@if ($errors->has('price'))

					<span class="help-block">
						<strong>{{ $errors->first('price') }}</strong>
					</span>

					@endif

				</div>				

				<div class="form-gruop">
					<div class="row">
						<div class="col-md-12">
							<label for="tag">Delivery Day</label>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							@foreach ($days as $day)

							@if(in_array($day->id, $del_days))
							<div class="checkbox">
								<label><input type="checkbox" name="days[]" value="{{$day->id}}" checked="true">
								{{$day->name}}</label>
							</div>
							@else					
							<div class="checkbox">
								<label><input type="checkbox" name="days[]" value="{{$day->id}}">
								{{$day->name}}</label>
							</div>
							@endif
							@endforeach
						</div>
					</div>
				</div>

				</br>	
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

@section('footer_js')
	<script src="{{ asset('js/select2.min.js') }}"></script>
	<script type="text/javascript">
  		$('select').select2();
	</script>
@endsection