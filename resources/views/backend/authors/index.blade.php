@extends('layouts.admin')

@section('content')
	
	<h2>Authors</h2> 
		<h3>
			<a class="btn btn-primary" href="{{ route('author.create') }}">create</a>
		</h3>
		<table class="table table-hover">
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
@stop