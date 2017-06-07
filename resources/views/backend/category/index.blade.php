@extends('admin.layout')

@section('header_link')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css')}}">
@endsection

@section('content')

<section class="content-header">
	<h1>
		Category
		<small>List</small>
	</h1>
	<ol class="breadcrumb">
		<li class="active block"><a href="{{ url('starwars/category/create') }}">
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
								<th>Category Name</th>
								<th>Category Link</th>
								<th>Menu</th>
								<th>Action</th>							
								<th></th>							
							</tr>
						</thead>
						<tbody>
							@foreach ($categories as $category)
							<tr>
								<td>{{$category->category_name}}</td>
								<td>{{$category->category_link}}</td>
								<td>{{$category->menu()->first()->menu_name}}</td>
								<td><a href="/starwars/category/{{ $category->id }}/edit">Edit</a></td>
								<td>
									<form class="form" role="form" method="POST" action="{{ url('starwars/category/'. $category->id) }}">
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
								<th>Category Name</th>
								<th>Category Link</th>
								<th>Menu</th>
								<th>Action</th>
								<th></th>
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