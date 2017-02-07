@extends('admin.layout')

@section('header_link')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css')}}">
@endsection

@section('content')

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
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image</th>
								<th>Name</th>								
								<th>Sub Category</th>
								<th>Category</th>
								<th>Action</th>								
							</tr>
						</thead>
						<tbody>
							@foreach ($products as $product)
							<tr>
								<td><img src="{{ $product->picture()->first()->showImage($product->picture()->first(), $thumbnailPath) }}"></td>
								<td>{{$product->name}}</td>
								<td>{{$product->sub_category_id}}</td>
								<td>{{$product->category_id}}</td>
								<td><a href="/gotg/category/{{ $product->id }}/edit">Edit</a></td>
							</tr> 
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>Image</th>
								<th>Name</th>								
								<th>Sub Category</th>
								<th>Category</th>
								<th>Action</th>	
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

@endsection