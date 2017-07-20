<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/style2.css') }}">
</head>
<body>
    <!-- #site-navigation -->
    <header id="masthead" class="site-header" role="banner">
        <div class="site-branding container">
            <div class="row">
                <div class="col-md-4 header-logo">
                    <a href="https://colorlib.com/newspaper-x/" class="custom-logo-link" rel="home" itemprop="url"><img width="185" height="55" src="{{ asset('theme/image/newspaperx_logo_185x55_dark.png') }}" class="custom-logo" alt="Newspaper X" itemprop="logo"></a>            
                </div>
                <div class="col-md-8 header-banner">
                    <a href="https://colorlib.com/wp/forums/">
                        <img width="729" height="90" src="{{ asset('theme/image/banner.png') }}" class="attachment-newspaper-x-wide-banner size-newspaper-x-wide-banner" alt="">
                    </a>
                </div>
            </div>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="fa fa-bars"></span></button>
                        <div class="menu-primary-menu-container">
                         <ul id="primary-menu" class="menu nav-menu" aria-expanded="false">
                            @foreach ($menus as $menu)
                            @if(count($menu->categories()->get()))
                            <li id="menu-item-128" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-128" aria-haspopup="true"><a href="https://colorlib.com/newspaper-x/category/news/">{{$menu->menu_name}}</a>
                                <ul class="sub-menu">
                                    @foreach ($menu->categories()->get() as $category)
                                    <li id="menu-item-136" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-136"><a href="https://colorlib.com/newspaper-x/#">{{$category->category_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @else                           
                            <li id="menu-item-127" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-135"><a href="#">{{$menu->menu_name}}</a></li>
                            @endif
                            @endforeach
                        </ul>
                    </div>                  
                </div>
            </div>
        </div>
    </nav><!-- #site-navigation -->
</header>
<!-- #site-navigation -->

{{-- <div id="content" class="site-content container">
</div>

<!-- widget section -->

<div class="newspaper-x-header-widget-area">
    <div id="newspaper_x_header_module-2" class="widget newspaper_x_widgets">    
        <div class="newspaper-x-recent-posts container">
            <ul>
                <li class="blazy b-loaded" id="newspaper-x-recent-post-0" style="background-image: url({{ $latest3->picture()->first()->showImage($latest3->picture()->first(), $destinationFolder) }});">
                    <div class="newspaper-x-post-info">
                        <h1>
                            <a href="https://colorlib.com/newspaper-x/2017/05/10/sed-purus-velit-finibus-non-semper-nonut-utas/">
                                {{$latest3->title}}               
                            </a>
                        </h1>
                        <span class="newspaper-x-category">
                            <a href="https://colorlib.com/newspaper-x/category/editorial/">
                                @if ( count($latest3->categories()->get()) )
                                {{$latest3->categories()->first()->category_name}}
                                @else
                                {{$latest3->menus()->first()->menu_name}}
                                @endif
                            </a>
                        </span>
                        <span class="newspaper-x-date">May 10, 2017</span>
                    </div>
                </li>

                <li class="blazy b-loaded" id="newspaper-x-recent-post-1" style="background-image: url({{ $latest2->picture()->first()->showImage($latest2->picture()->first(), $destinationFolder) }});">
                    <div class="newspaper-x-post-info">
                        <h6>
                            <a href="https://colorlib.com/newspaper-x/2017/05/10/nunc-hendrerit-egestas-amus-ad-arcu-im-usa/">
                                {{$latest2->title}}                    
                            </a>
                        </h6>
                        <span class="newspaper-x-category">
                            <a href="https://colorlib.com/newspaper-x/category/editorial/">
                                @if ( count($latest2->categories()->get()) )
                                {{$latest2->categories()->first()->category_name}}
                                @else
                                {{$latest2->menus()->first()->menu_name}}
                                @endif
                            </a>
                        </span>
                        <span class="newspaper-x-date">May 10, 2017</span>
                    </div>
                </li>

                <li class="blazy b-loaded" id="newspaper-x-recent-post-2" style="background-image: url({{ $latest1->picture()->first()->showImage($latest1->picture()->first(), $destinationFolder) }});">
                    <div class="newspaper-x-post-info">
                        <h6>
                            <a href="https://colorlib.com/newspaper-x/2017/05/10/itum-binus-sitam-conestum-ey/">
                                {{$latest1->title}}                        
                            </a>
                        </h6>
                        <span class="newspaper-x-category">
                            <a href="https://colorlib.com/newspaper-x/category/editorial/">
                                @if ( count($latest1->categories()->get()) )
                                {{$latest1->categories()->first()->category_name}}
                                @else
                                {{$latest1->menus()->first()->menu_name}}
                                @endif
                            </a>
                        </span>
                        <span class="newspaper-x-date">May 10, 2017</span>
                    </div>
                </li>

            </ul>        
        </div>    
    </div>
</div>

<div class="container site-content">
    <div class="row">
        <div class="col-md-12 newspaper-x-content newspaper-x-with-sidebar">

            <!--advertising-->
            <div id="newspaper_x_banner-3" class="newspaper-x-type-image widget widget_newspaper_x_banner">
                <div class="newspaper-x-image-banner">
                    <a href="https://colorlib.com/">    
                        <img width="729" height="90" src="{{ asset('theme/image/banner.png') }}" class="attachment- size-" alt="" sizes="(max-width: 729px) 100vw, 729px">
                    </a>
                </div>
            </div>
            <!--advertising-->

            <!--latest news-->
            <div id="newspaper_x_widget_posts_c-2" class="widget newspaper_x_widgets">    
                <h3 class="widget-title"><span>Latest News</span></h3>
                <div class="row newspaper-x-layout-c-row">
                    @foreach ($posts as $post)

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="newspaper-x-blog-post-layout-c">

                            <div class="newspaper-x-image">
                                <a href="https://colorlib.com/newspaper-x/2017/05/10/maecenas-tincidunt-posuere-quam-eu-consectetur-justo-4/">
                                    <img width="550" height="360" src="{{ $post->picture()->first()->showImage($post->picture()->first(), $destinationFolder) }}" alt="">
                                </a>
                            </div>
                            <div class="newspaper-x-title">
                                <h4>
                                    <a href="#">
                                        {{$post->title}}
                                    </a>
                                </h4>
                            </div>

                            <span class="newspaper-x-category">
                                <a href="https://colorlib.com/newspaper-x/category/news/">
                                    @if ( count($post->categories()->get()) )
                                    {{$post->categories()->first()->category_name}}
                                    @else
                                    {{$post->menus()->first()->menu_name}}
                                    @endif
                                </a> 
                            </span>
                            <span class="newspaper-x-date">May 10, 2017</span>

                            <div class="newspaper-x-content">
                                Semper leo. Fusce lectus justo, porta quis felis at, imperdiet elementum libero. Duis nec dignissim lectus.Lorem <a href="#">...</a>
                            </div>
                        </div>
                    </div>
                    @endforeach                    
                </div>
            </div>
            <!--latest news-->
        </div>
    </div>
</div>
 --}}

