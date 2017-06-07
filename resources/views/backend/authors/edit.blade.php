@extends('layouts.admin')

@section('content')
	<h2>Author Create</h2>
	{!! Form::open(['route' => ['author.update',$author->id] , 'method' => 'patch']) !!}

	<div class="form-group">
		{!! Form::label('name', 'Author Name:') !!}

		@if($errors->has('name'))
			<label class="text-danger" for="name"><small>{{ $errors->first('name') }}</small></label>
		@endif

		{!! Form::text('name',null,['class'=>'form-control' , 'value' => $author->id ]) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Save', ['class' => 'btn btn-primary violet']) !!}
	</div>
	{!! Form::close() !!}
@endsection