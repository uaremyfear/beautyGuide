@extends('layouts.admin')
@section('content')

<div class="box-header">
	<h3 class="box-title">Menu Create</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
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
@endsection

@section('footer-scripts')
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