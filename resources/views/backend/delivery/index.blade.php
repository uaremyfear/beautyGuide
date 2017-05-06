@extends('admin.layout')

@section('header_link')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css')}}">
@endsection

@section('content')

<section class="content-header">
	<h1>
		Place
		<small>List</small>
	</h1>
	<ol class="breadcrumb">
		<li class="active block"><a href="{{ url('gotg/delivery/create') }}">
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
								<th>Place</th>
								<th>Price</th>
								<th>Days</th>								
								<th></th>								
								<th></th>								
							</tr>
						</thead>
						<tbody>
							@foreach ($deliveries as $delivery)
							<tr>
								<td>{{$delivery->place}}</td>
								<td>{{$delivery->price}}</td>
								<td>
									@foreach ($delivery->days()->get() as $day)
									{{$day->name}} ,
									@endforeach
								</td>
								<td><a href="/gotg/delivery/{{ $delivery->id }}/edit">Edit</a>  &nbsp;&nbsp;&nbsp;&nbsp;
								</td>
								<td>
									<form class="form" role="form" method="POST" action="{{ url('gotg/delivery/'. $delivery->id) }}">
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
								<th>Place</th>
								<th>Price</th>
								<th>Days</th>
								<th></th>		
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