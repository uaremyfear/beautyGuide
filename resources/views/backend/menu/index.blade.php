@extends('layouts.admin')
@section('content')

<div class="box-header">
	<h3 class="box-title">Post Create</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
	<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Menu Name</th>
				<th>Menu link</th>
				<th>Action</th>								
				<th></th>								
			</tr>
		</thead>
		<tbody>
			@foreach ($menus as $menu)
			<tr>
				<td>{{$menu->menu_name}}</td>
				<td>{{$menu->menu_link}}</td>
				<td><a href="/starwars/menu/{{ $menu->id }}/edit">Edit</a></td>
				<td>
					<form class="form" role="form" method="POST" action="{{ url('starwars/menu/'. $menu->id) }}">
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
				<th>menu Name</th>
				<th>Menu link</th>
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