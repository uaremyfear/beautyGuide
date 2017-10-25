<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" type="image/ico" href="{{ asset('resource/icon.png') }} ">

    <title>Material Design Bootstrap</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Material Design Bootstrap -->
    <link href="{{ asset('front/css/mdb.min.css') }} " rel="stylesheet">

    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */

        h4 {
            line-height: 150%;
        }

        .card-news p{
            line-height: 150%;
            font-size: 1.2rem;
        }

        .tags {
            padding-right: .9rem;
            padding-left: .9rem;
        }

        .btn-fb {
            background-color: #3B5998;
        }

        .btn-tw {
            background-color: #55ACEE;
        }

        .btn-gplus {
            background-color: #DD4B39;
        }


        
        main {
            margin-top: 3rem;
        }
        
        main .card {
            margin-bottom: 2rem;
        }
        
        @media only screen and (max-width: 768px) {
            .read-more {
                text-align: center;
            }
        }
        
        .navbar {
            background-color: #0f6256;
        }
        
        footer.page-footer {
            background-color: #0f6256;
            margin-top: 2rem;
            padding-top: 0px;
        }
        .navbar .btn-group .dropdown-menu a:hover {
            color: #000 !important;
        }

        .navbar .btn-group .dropdown-menu a:active {
            color: #fff !important;
        }
        
    </style>

</head>

<body>

    <header>
        <!--Navbar-->
        <div class="container">
            <h1 class="my-3 mt-3">Beauty Guide</h1>
        </div>
        <nav class="navbar navbar-expand-lg navbar-inverse navbar-dark">

            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item mr-4">
                            <a class="nav-link" href="/"> Home <span class="sr-only">(current)</span></a>
                        </li>
                        @foreach ($menus as $menu)

                        @if(count($menu->categories()->get()))
                        <li class="nav-item btn-group mr-4">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $menu->menu_name }} 
                            </a>
                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                @foreach ($menu->categories()->get() as $category)
                                <a class="dropdown-item" href="{{ url($category->category_link) }}">{{ $category->category_name }}</a>
                                @endforeach                                
                            </div>
                        </li>
                        
                        @else
                        <li class="nav-item mr-4">
                            <a class="nav-link" href="{{ url($menu->menu_link) }}"> {{ $menu->menu_name }} <span class="sr-only">(current)</span></a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                    <form class="form-inline">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                    </form>
                </div>
            </div>
        </nav>
        <!--/.Navbar-->
    </header>
    
    @yield('content')

    <footer class="page-footer center-on-small-only">
        <!--Copyright-->
        <div class="footer-copyright">
            <div class="containter-fluid">
                © 2017 Copyright: <a href="sithu@mail.com"> technoverse.com </a>
            </div>
        </div>
        <!--/.Copyright-->
    </footer>
    <!--/.Footer-->

    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('front/js/jquery-3.1.1.min.js') }}"></script>

    <!-- Bootstrap dropdown -->
    <script type="text/javascript" src="{{ asset('front/js/popper.min.js') }}"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('front/js/bootstrap.min.js') }}"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('front/js/mdb.min.js') }}"></script>

    <script>
        new WOW().init();
    </script>    
</body>

</html>