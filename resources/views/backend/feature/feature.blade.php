@extends('admin.layout')

@section('header_link')
<style>
	.prodcut-show{
		margin-bottom: 30px;
	}
</style>
@endsection

@section('content')

<section class="content-header">
	<h1>
		Feature
		<small>List</small>
	</h1>
	
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="well capital">
				<div class="row">
					<form class="form" role="form" method="POST" action="{{ url('gotg/feature') }}" enctype="multipart/form-data">



						{{ csrf_field() }}
						
						<div class="form-group col-md-12">
							<button type="submit" class="btn btn-primary btn-lg">
								Update
							</button>
						</div>

						@foreach ($features as $product)
						<div class="col-md-3 prodcut-show">
							<img src="{{ $product->picture()->first()->showImage($product->picture()->first(), $destinationFolder) }}" style="width:200px;height:200px" alt="">

							<div class="form-gruop">
								<div class="row">
									<div class="col-md-12">												
										<div class="checkbox">
											<label>
												<input type="checkbox" name="feature[]" value="{{$product->id}}" checked="true">
												<strong>{{$product->name}}</strong>
											</label>
										</div>								
									</div>
								</div>
							</div>
						</div>
						@endforeach

						@foreach ($products as $product)
						<div class="col-md-3 prodcut-show">
							<img src="{{ $product->picture()->first()->showImage($product->picture()->first(), $destinationFolder) }}" style="width:200px;height:200px" alt="">

							<div class="form-gruop">
								<div class="row">
									<div class="col-md-12">												
										<div class="checkbox">
											<label>
												<input type="checkbox" name="feature[]" value="{{$product->id}}">
												<strong>{{$product->name}}</strong>
											</label>
										</div>								
									</div>
								</div>
							</div>
						</div>
						@endforeach

						<div class="form-group col-md-12">
							<button type="submit" class="btn btn-primary btn-lg">
								Update
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
