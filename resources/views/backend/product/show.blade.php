@extends('admin.layout')

@section('header_link')
<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">

@endsection

@section('content')

<section class="content-header">
	<h1>
		Product
		<small>Detail</small>
	</h1>
</br>

</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- Password Form Input -->
			<div class="well capital">
				<div class="row">
					<div class="col-md-2"><span>Name :</span></div>
					<div class="col-md-10"><strong>{{$product->name}}</strong></div>
				</div>

				<hr>

				<div class="row">
					<div class="col-md-2"><span>Category :</span></div>
					<div class="col-md-10"><strong>{{$product->category()->first()->category_name}}</strong></div>
				</div>
				
				<hr>

				<div class="row">
					<div class="col-md-2"><span>Sub Category :</span></div>
					<div class="col-md-10"><strong>{{$product->subcategory()->first()->sub_name}}</strong></div>
				</div>

				<hr>

				<div class="row">
					<div class="col-md-2"><span>Description :</span></div>
					<div class="col-md-10"><p>{{$product->description}}</p></div>
				</div>

				<hr>

				<div class="row">
					<div class="col-md-2"><span>Image :</span></div>
					<div class="col-md-10"><img src="{{ $product->picture()->first()->showImage($product->picture()->first(), $destinationFolder) }}" width="300px"></div>
				</div>

				<hr>

				<div class="row">
					<div class="col-md-1">
						<a href="/gotg/product/{{$product->id}}/edit"><input class="btn btn-success" Onclick="return ConfirmDelete();" type="submit" value="Edit"></a>
					</div>
					<div class="col-md-2">
						<form class="form" role="form" method="POST" action="{{ url('gotg/product/'. $product->id) }}">
							<input type="hidden" name="_method" value="delete">
							{{ csrf_field() }}

							<input class="btn btn-danger" Onclick="return ConfirmDelete();" type="submit" value="Delete">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@section('footer_js')
<script src="{{ asset('js/select2.min.js') }}"></script>
<script type="text/javascript">
	$('select').select2();
</script>

<script>
	function ConfirmDelete()
	{
		var x = confirm("Are you sure you want to delete?");
		if (x)
			return true;
		else
			return false;
	}
</script>
@endsection