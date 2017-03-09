@extends('admin.layout')

@section('content')

<section class="content-header">
	<h1>
		Product 
		<small>Edit</small>
	</h1>
</section>

{{var_dump($errors)}}

<section class="content">
	<div class="row" id="app">
		<div class="col-md-12">
			<form class="form" role="form" method="POST" action="{{ url('gotg/product/'. $product->id) }}" enctype="multipart/form-data">
				<input type="hidden" name="_method" value="patch">

				{{ csrf_field() }}

				<!-- name Form Input -->
				
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

					<label class="control-label">Product Name</label>

					<input type="text" class="form-control" name="name" value="{{ $product->name }}">

					@if ($errors->has('name'))

					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>

					@endif

				</div>

				<!-- price Form Input -->
				
				<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">

					<label class="control-label">Price</label>

					<input class="form-control" name="price" value="{{ $product->price }}">

					@if ($errors->has('price'))

					<span class="help-block">
						<strong>{{ $errors->first('price') }}</strong>
					</span>

					@endif

				</div>

				<!-- description Form Input -->
				
				<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

					<label class="control-label">Product Description</label>

					<textarea class="form-control" name="description">{{ $product->description }}</textarea>

					@if ($errors->has('description'))

					<span class="help-block">
						<strong>{{ $errors->first('description') }}</strong>
					</span>

					@endif

				</div>
				
				<!-- Category Form Input -->

				<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
					<label class="control-label" >Category Name</label>
					
					<select class="form-control" id="sub_category_id" name="category" v-model="vcategory_id">
						<option value="">Please Choose One</option>
						<option :value="category.id"  v-for="category in categories">@{{category.category_name}}</option>
					</select>
					
					@if ($errors->has('category'))
					<span class="help-block">
						<strong>{{ $errors->first('category') }}</strong>
					</span>
					@endif
				</div>

				<!-- Sub Category Form Input -->

				<div class="form-group{{ $errors->has('sub_category_id') ? ' has-error' : '' }}">
					<label class="control-label">Sub Category Name</label>
					<select class="form-control" id="sub_category_id" name="sub_category_id" v-model="sub_category_id">						
						<option value="">Please Choose One</option>						
						<option :value="subcategory.id" v-for="subcategory in subcategories_filter">@{{subcategory.sub_name}}
						</option>						
					</select>

					@if ($errors->has('sub_category_id'))
					<span class="help-block">
						<strong>{{ $errors->first('sub_category_id') }}</strong>
					</span>
					@endif
				</div>
				
				
				<!-- Image Form Input -->
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">Current Image</label>
								<br>
								<img src="{{ $product->picture()->first()->showImage($product->picture()->first(), $thumbnailPath) }}">
							</div>
						</div>

						<div class="col-md-8">
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
					</div>
				</div>	
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-lg">
						Update
					</button>
				</div>
			</form>
		</div>
	</div>
</section>		
@endsection

@section('footer_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.2.0/vue-resource.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.0.1/vue.js"></script>

<script>
	var categories = <?php echo json_encode($categories) ?>;;
	var subcategories = <?php echo json_encode($subcategories) ?>;;
	var category = {{$product->category_id}};
	var subcategory = {{$product->sub_category_id}};
	
	var app = new Vue({
		el : '#app',

		data : {
			categories : categories,
			subcategories : subcategories,
			vcategory_id : category,
			byCategory : "",
			sub_category_id : subcategory,			
		},

		watch: {
			vcategory_id: function (vcategory_id) {
				var vm = this;
				this.sub_category_id = "";
			}
		},

		computed: {
			subcategories_filter: function (vcategory_id) {
				var vm = this;
				return this.subcategories.filter(function (subcategory) {
					return subcategory.category_id == vm.vcategory_id;
				});
			}
		}	
	});

</script>	
@endsection()