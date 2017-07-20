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
				<th class="col-md-1">Prefix</th>
				<th class="col-md-6">Title</th>
				<th class="col-md-3">Category</th>
				<th class="col-md-1">Edit</th>
				<th class="col-md-1"></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($posts as $post)
			<tr>
				<td>{{$post->getPrefix()}}</td>
				<td>
					<a href="/starwars/post/{{$post->prefix}}">
						{{$post->title}}
					</a>
				</td>
				<td>
					@foreach ($post->categories()->get() as $category)
					{{ $category->category_name }} <br>
					@endforeach
				</td>

				<td><a href="/starwars/post/{{$post->id}}/edit">Edit</a></td>

				<td class="text-center">
					<form class="form" role="form" method="POST" action="{{ url('/starwars/post/'. $post->id) }}">
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
				<th>Prefix</th>
				<th>Title</th>
				<th>Category</th>								
				<th>Tags</th>
				<th>Author</th>
				<th>Edit</th>
				<th></th>
			</tr>
		</tfoot>
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

