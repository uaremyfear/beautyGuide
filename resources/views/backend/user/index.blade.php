@extends('admin.layout')

@section('header_link')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css')}}">
@endsection

@section('content')

<section class="content-header">
	<h1>
		User
		<small>List</small>
	</h1>
	<ol class="breadcrumb">
		<li class="active block"><a href="{{ url('gotg/user/create') }}">
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
								<th>Name</th>
								<th>Email</th>
								<th>Role</th>								
								<th>Action</th>								
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
							<tr>
								<td>{{$user->name}}</td>
								<td>{{$user->email}}</td>
								<td>
									@foreach ($user->roles()->get() as $role)
										{{$role->slug}} ,
									@endforeach
								</td>
								<td><a href="/gotg/user/{{ $user->id }}/edit">Edit</a>  &nbsp;&nbsp;&nbsp;&nbsp;
								<a href="changepassword/user/{{ $user->id }}">Change Password</a></td>
							</tr> 
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Role</th>
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