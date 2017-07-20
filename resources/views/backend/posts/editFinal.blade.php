@extends('layouts.admin')

@section('header-links')
<style>
	.select2-container--default .select2-selection--multiple .select2-selection__choice {
		background-color: #3c8dbc;
		border-color: #367fa9;
		padding: 1px 10px;
	}
</style>
@endsection

@section('content')

<div class="box-header">
	<h3 class="box-title">{{ $post->title }}</h3>
</div>
<!-- /.box-header -->
<div class="box-body">
	<form class="form" role="form" method="POST" action="{{ url('starwars/post/'.$post->id) }}" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="patch">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="body">Post Content</label>
			<br>
			@if($errors->has('body'))
			<label class="text-danger" for="title"><small>{{ $errors->first('body') }}</small></label>
			@endif
			<textarea name="content" class="form-control" rows="20">{!! $post->content !!}</textarea>
		</div>
		<br>
		<div class="row">
			<div class="col-md-3">
				<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
					<div class="form-group">
						<label class="control-label">Primary Image
						</label>
						<input type="file" name="image" id="image">
					</div>
					@if ($errors->has('image'))
					<span class="help-block">
						<strong>{{ $errors->first('image') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="col-md-9">
				<div class="form-group">
					<label class="control-label">Current Image</label>
					<br>
					@if ($post->picture()->first())
					<img src="{{ $post->picture()->first()->showImage($post->picture()->first(), $thumbnailPath) }}">
					@else
					<h2> No Image </h2>
					@endif
				</div>
			</div>
		</div>				

		<div class="form-gruop">
			<button type="submit" class="btn btn-primary">Update</button>
		</div>
	</form>
</div>
@stop

@section('footer-scripts')
<script>
	var route_prefix = "{{ url(config('lfm.prefix')) }}";
</script>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
	var editor_config = {
		path_absolute : "",
		selector: "textarea[name=content]",
		plugins: [
		"link image"
		],
		relative_urls: false,
		height: 129,
		file_browser_callback : function(field_name, url, type, win) {
			var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
			var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

			var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
			if (type == 'image') {
				cmsURL = cmsURL + "&type=Images";
			} else {
				cmsURL = cmsURL + "&type=Files";
			}

			tinyMCE.activeEditor.windowManager.open({
				file : cmsURL,
				title : 'Filemanager',
				width : x * 0.8,
				height : y * 0.8,
				resizable : "yes",
				close_previous : "no"
			});
		}
	};

	tinymce.init(editor_config);
</script>

<script>
	{!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
</script>
<script>
	$('#lfm').filemanager('image', {prefix: route_prefix});
</script>
@endsection