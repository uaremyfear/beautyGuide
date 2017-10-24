@extends('layouts.frontendLayout')

@section('content')
<main>
    <!--Main layout-->
    <div class="container">
        <!--First row-->
        <div class="row wow fadeIn" data-wow-delay="0.2s">
            <div class="col-lg-7">
                <!--Featured image -->
                <div class="view overlay hm-white-light z-depth-1-half">
                    <img src="{{ asset('images/posts/' . $post->picture()->first()->image_name.'.'.$post->picture()->first()->image_extension) }}" style="width:100%;max-height:250px;" class="img-fluid " alt="">
                    {{-- <div class="mask">
                    </div> --}}
                </div>
                <br>
            </div>

            <!--Main information-->
            <div class="col-lg-5">
                <h4 class="h4-responsive">{{$post->title}}</h4>
                <hr>
                <a href="{{ url('/feature/' . $post->id ) }}" class="btn btn-info">See Full Story!</a>
            </div>
        </div>

        <hr class="extra-margins my-4">

        <!--Page heading-->
        <div class="row">
            <div class="col-md-12">
                <h3 class="h3-responsive">Latest News</h3>
            </div>
        </div>
        <!--/.Page heading-->

        <!--First row-->
        <div class="row mt-3 wow">

            <!--First column-->
            @foreach ($posts as $key => $post)
            @if( $key < 3 )
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.2s">
                <!--/.Card-->
                <a href="{{ url('/latest/' . $post->id ) }}">
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
            @endif
            @endforeach            
            <!--/.First column-->
        </div>
        <!--/.First row-->

        <!--Second row-->
        <div class="row mt-3">
            <!--First column-->
            @foreach ($posts as $key => $post)
            @if( $key > 2 )
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.2s">
                <!--/.Card-->
                <a href="{{ url('/latest/' . $post->id ) }}">
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
            @endif
            @endforeach   
        </div>
        <!--/.Second row-->
        <hr>


        <!--/.Page heading-->


        <div class="row">
            <div class="col-md-9">
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h3 class="h3-responsive">Feature News</h3>
                    </div>
                </div>
                <!--First row-->
                <div class="row mt-3 wow">
                    <!--First column-->
                    @foreach ($posts as $key => $post)
                    @if( $key < 3 )
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.2s">
                        <!--/.Card-->
                        <a href="{{ url('/feature/' . $post->id ) }}">
                            <div class="card">
                                <!--Card image-->
                                <div class="view overlay hm-white-light z-depth-1-half">
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
                    @endif
                    @endforeach
                </div>

                <!--First row-->
                <div class="row mt-3 wow">
                    <!--First column-->
                    @foreach ($posts as $key => $post)
                    @if( $key > 2 )
                    <div class="col-lg-4 wow fadeIn" data-wow-delay="0.2s">
                        <!--/.Card-->
                        <a href="{{ url('/feature/' . $post->id ) }}">
                            <div class="card">
                                <!--Card image-->
                                <div class="view overlay hm-white-light z-depth-1-half">
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
                    @endif
                    @endforeach                    
                </div>
            </div>

            <div class="col-md-3">
                <div class="row mt-3">
                    <div class="col-md-12">
                        <h3 class="h3-responsive">Follow Us</h3>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <!--Facebook-->
                        <button type="button" class="btn btn-fb waves-effect waves-light">
                            <i class="fa fa-facebook left"></i> Facebook
                        </button>
                        <!--Twitter-->

                        <button type="button" class="btn btn-tw waves-effect waves-light">
                            <i class="fa fa-twitter left"></i> Twitter
                        </button>
                        <!--Google +-->
                        <button type="button" class="btn btn-gplus waves-effect waves-light">
                            <i class="fa fa-google-plus left"></i> Google +
                        </button>
                        <!--Linkedin-->                                             
                    </div>                    
                </div>

                <hr>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <h3 class="h3-responsive">Tags</h3>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12">
                        @foreach ($tags as $tag)
                        <a href="" class="btn btn-outline-primary waves-effect tags">{{ $tag->name }}</a> 
                        @endforeach

                    </div>                    
                </div>
            </div>
        </div>




        <!--/.First row-->

        <!--Pagination-->
            <!-- <nav class="row flex-center wow fadeIn" data-wow-delay="0.2s">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#!" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#!">1 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item"><a class="page-link" href="#!">4</a></li>
                    <li class="page-item"><a class="page-link" href="#!">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#!" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav> -->
            <!--/.Pagination-->
        </div>
        <!--/.Main layout-->
    </main>
    <!--NEWLIST END-->
    @endsection