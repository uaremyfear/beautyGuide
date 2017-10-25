				<div class="mt-3">
					<h3 class="h3-responsive">{{$postList->title}}</h3>
				</div>

				<hr>
				
				<div class="row">
					@foreach($postList->posts()->get() as $post)

					<div class="col-lg-4 wow fadeIn" data-wow-delay="0.2s">
						<!--/.Card-->
						<a href="{{ url('/'. $postList->link . '/' . $post->id ) }}">
							<div class="card">
								<!--Card image-->
								<div class="view overlay z-depth-1-half hm-zoom">
									<img class="img-fluid" src="{{ asset('images/posts/' . $post->picture()->first()->image_name.'.'.$post->picture()->first()->image_extension) }}" alt="Card image cap">
									<div class="mask">
									</div>
								</div>
								<!--/.Card image-->

								<!--Card content-->
								<div class="card-body news-title">
									<!--Title-->
									<h4 class="card-text h4-responsive card-title card-news"><p>{{$post->title}}</p></h4>
									<!--Text-->                                
								</div>
								<!--/.Card content-->
							</div>
						</a>
					</div>
					@endforeach
				</div>