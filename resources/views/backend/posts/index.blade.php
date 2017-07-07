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
		Post
		<small>List</small>
	</h1>
	<ol class="breadcrumb">
		<li class="active block"><a href="{{ url('starwars/post/create') }}">
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
								<th class="col-md-1">Prefix</th>
								<th class="col-md-5">Title</th>
								<th class="col-md-3">Category</th>
								<th class="col-md-1">Content</th>								
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
								<td>
									{{ count($post->subContents()->get() )}}

									<a href="/starwars/article/{{$post->id}}/subcontent/create" class="pull-right">
										<span class="glyphicon glyphicon-edit"></span>
									</a>
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