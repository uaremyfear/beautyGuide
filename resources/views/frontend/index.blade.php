<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
  <div class="container">

    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="https://getbootstrap.com/examples/navbar/#">Beauty Guide</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">\
                    @foreach ($menus as $menu)
                        @if(count($menu->categories()->get()))
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$menu->menu_name}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach ($menu->categories()->get() as $category)
                                        <li><a href="#">{{$category->category_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li><a href="#">{{$menu->menu_name}}</a></li>
                        @endif
                    @endforeach
                </ul>
                {{-- <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="https://getbootstrap.com/examples/navbar/">Default <span class="sr-only">(current)</span></a></li>
                    <li><a href="https://getbootstrap.com/examples/navbar-static-top/">Static top</a></li>
                    <li><a href="https://getbootstrap.com/examples/navbar-fixed-top/">Fixed top</a></li>
                </ul> --}}
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
</body>
</html>