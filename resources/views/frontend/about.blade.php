@extends('layouts.frontendLayout')

@section('content')

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <nav>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <img alt="#" class="wp-post-image" src="images/dummy/about-image.jpg" width="1140" height="284">
            <h1 class="center"><span class="light">A</span> Little Something About Us</h1>
            <hr class="divider">
            <div class="text-shrink">
                <p class="text-highlight">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate, leo vel malesuada tincidunt, purus nunc tristique erat, at elementum tellus mi nec mi. Nunc rutrum ullamcorper blandit.
                </p>
            </div>
            <hr class="divider  divider-about">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <h3><span class="light">The</span> Beginnings</h3>
                    <p class="text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque consectetur leo, eu porta metus. Nulla justo lacus, aliquam vel libero nec, faucibus enim tristique, molestie ante. Nunc a dolor eget lectus venenatis ullamcorper. Nullam dictum elementum lacus quis facilisis. Phasellus mollis tempus tempus. Fusce ut sagittis quam, quis facilisis tellus. Nam vel aliquet leo. Integer lacus tortor, ullamcorper sit amet interdum at, pulvinar sit amet risus.
                    </p>                    
                </div>
                <div class="col-xs-12 col-sm-6">
                    <h3><span class="light">Our</span> Plans in the Future</h3>
                    <p class="text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque consectetur leo, eu porta metus. Nulla justo lacus, aliquam vel libero nec, viverra placerat neque. Cras nec nunc sollicitudin, faucibus enim tristique, molestie ante. Nunc a dolor eget lectus venenatis ullamcorper. Nullam dictum elementum lacus quis facilisis. Etiam sit amet euismod eros. Phasellus mollis tempus tempus. Fusce ut sagittis quam, quis facilisis tellus. Nam vel aliquet leo. Integer lacus tortor, ullamcorper sit amet interdum at, pulvinar sit amet risus.
                    </p>                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

