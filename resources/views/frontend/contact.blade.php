@extends('layouts.frontendLayout')

@section('content')

<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<nav>
					<ol class="breadcrumb">
						<li><a href="{{ url('/') }}">Home</a></li>

						<li class="active">Contact</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>



@endsection