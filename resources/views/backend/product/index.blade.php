@extends('admin.layout')

@section('header_link')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css')}}">
@endsection

@section('content')

<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<section class="content-header">
	<h1>
		Product
		<small>List</small>
	</h1>
	<ol class="breadcrumb">
		<li class="active block"><a href="{{ url('gotg/product/create') }}">
			<button class="btn btn-block btn-success">create</button>
		</a></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<!-- /.box-header -->
				<div class="box-body capital">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image</th>
								<th>Name</th>
								<th>Price</th>								
								<th>Sub Category</th>
								<th>Category</th>
								<th>Share</th>
								<th>Edit</th>
								<th>Delete</th>							
							</tr>
						</thead>
						<tbody>
							@foreach ($products as $product)
							<tr>
								<td><img src="{{ $product->picture()->first()->showImage($product->picture()->first(), $thumbnailPath) }}"></td>
								<td><a href="/gotg/product/{{$product->id}}">{{$product->name}}</a></td>
								<td>{{$product->price}}</td>
								<td>{{$product->subcategory()->first()->sub_name}}</td>
								<td>{{$product->category()->first()->category_name}}</td>
								
								<td><div class="banners--small fb-share-button banners--small--social"
									data-href="http://www.dardoepyi.com/product/{{$product->id}}" 
									data-layout="button_count"
									></div>
								</td>

								<td><a href="/gotg/product/{{$product->id}}/edit">Edit</a></td>
								<td>
									<form class="form" role="form" method="POST" action="{{ url('gotg/product/'. $product->id) }}">
										<input type="hidden" name="_method" value="delete">
										{{ csrf_field() }}

										<input class="btn btn-danger" Onclick="return ConfirmDelete();" type="submit" value="Delete">
									</form>
								</td>
							</tr> 
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>Image</th>
								<th>Name</th>								
								<th>Sub Category</th>
								<th>Category</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>
</section>

@endsection

@section('footer_js')

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

<script>
	$(function () {
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});
	});
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