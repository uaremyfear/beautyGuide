@extends('admin.layout')

@section('header_link')
	<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
	
@endsection

@section('content')

<section class="content-header">
	<h1>
		Permission
		<small>Denied</small>
	</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<h1>U Dont Have Enough Access !!!</h1>
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