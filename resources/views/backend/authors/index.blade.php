@extends('layouts.admin')

@section('content')


<div class="box-header">
	<h3 class="box-title">Data Table With Full Features</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody> 
			@foreach ($authors as $author)
			<tr>
				<td>{{ $author->id }}</td>
				<td>{{ $author->name }}</td>
				<td>
					<div class="row">
						<div class="col-md-2">
							<a class="btn btn-primary" href="{{ route('author.edit',$author->id) }}">Edit</a>
						</div>

						<div class="col-md-2">
							<form action="{{ route('author.destroy', $author->id) }}" method="post">
								{{ csrf_field() }}
								{{ method_field('delete') }}
								<button class="btn btn-danger">Delete</button>
							</form>
						</div>
					</div>
				</td>
			</tr>
			@endforeach						
		</tbody>
	</table>
</div>

@endsection

@section('footer-scripts')

<!-- page script -->
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
