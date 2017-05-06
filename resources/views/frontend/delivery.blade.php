@extends('layouts.frontendLayout')

@section('header_style')
<style>

    .bak-color{
        padding-left:6px;
        padding-right:6px;
        padding-bottom: 20px;
    }

    .header-day {
        border-top-right-radius :1em;
        border-top-left-radius :1em;
        height: 45px;
        margin-bottom: 1px;
    }

    .header-day p {
        font-size: 14px;
        color: #ffffff;
        vertical-align: middle;
        text-align: center;
        padding-top: 10px;             
    }

    .header-place {
        text-align: center;
        height: 45px;
    }

    .header-charge{
        padding: 0;
        margin: 0;
        text-align: center;
        height: 45px;
    }

    .header-place p{
        padding-top: 10px;
        font-size: 13px;
    }

    .header-charge p{
        padding-top: 3px;
        letter-spacing:-1px;
        font-size: 12px;
    }
    
    .nav-list{
        margin: 0;
        padding: 0;
    }

    .nav-place {
        margin-left: 0;
        margin-right: 0;
        padding-right: 0;
        padding-left: 5px;
        padding-top: 6px;
    }

    .nav-price {
        margin-left: 0;
        margin-right: 0;
        padding-top: 6px;       
    }

    .nav-place-bottom{
        height: 10px;
        border-bottom-left-radius :1em;
    }

    .nav-price-bottom{
        height: 10px;
        border-bottom-right-radius :1em;
    }

    .bg-blue-1{background-color: #5d95d1;}
    .bg-blue-2{background-color: #5e95ce;}
    .bg-blue-3{background-color: #75b4da;}
    .bg-blue-4{background-color: #a4c2e6;}
    .bg-blue-5{background-color: #acd0e6;}

    .bg-green-1{background-color: #4bb748;}
    .bg-green-2{background-color: #4ab647;}
    .bg-green-3{background-color: #83be3c;}
    .bg-green-4{background-color: #93c950;}
    .bg-green-5{background-color: #b1d644;}

    .bg-red-1{background-color: #f36d1b;}
    .bg-red-2{background-color: #f06f17;}
    .bg-red-3{background-color: #fbae12;}
    .bg-red-4{background-color: #f8ab23;}
    .bg-red-5{background-color: #f6ca5e;}


</style>
@endsection

@section('content')

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <nav>
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Delivery</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container  push-down-30">
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            


            <div class="col-sm-2 col-xs-12 bak-color">
                <div class="col-sm-12 col-xs-12 header-day bg-blue-1">
                    <p>
                        တနလၤာေန ့
                    </p>
                </div>
                <div class="col-sm-8 col-xs-8 header-place bg-blue-2">
                    <p>ေနရာ</p>                    
                </div>

                <div class="col-sm-4 col-xs-4 header-charge bg-blue-3">
                    <p>
                        ပို ့ေဆာင္ခ</br>                        
                        (က်ပ္)
                    </p>
                </div>
                
                <div class="col-sm-12 col-xs-12 nav-list">
                    @foreach ($mon as $place)
                    <div class="col-sm-8 col-xs-8 nav-place bg-blue-4">
                        <span>
                            - {{$place->place}}
                        </span>
                    </div>

                    <div class="col-sm-4 col-xs-4 nav-price bg-blue-5">
                        <span>
                            {{$place->price}}
                        </span>
                    </div>
                    @endforeach
                    <div class="col-sm-8 col-xs-8 nav-place-bottom bg-blue-4">

                    </div>

                    <div class="col-sm-4 col-xs-4 nav-price-bottom bg-blue-5">

                    </div>
                </div> 
            </div>




            <div class="col-sm-2 col-xs-12 bak-color">
                <div class="col-sm-12 col-xs-12 header-day bg-green-1">
                    <p>
                        အဂၤါေန ့
                    </p>
                </div>
                <div class="col-sm-8 col-xs-8 header-place bg-green-2">
                    <p>ေနရာ</p>                    
                </div>

                <div class="col-sm-4 col-xs-4 header-charge bg-green-3">
                    <p>
                        ပို ့ေဆာင္ခ</br>                        
                        (က်ပ္)
                    </p>
                </div>
                
                <div class="col-sm-12 col-xs-12 nav-list">
                    @foreach ($thue as $place)
                    <div class="col-sm-8 col-xs-8 nav-place bg-green-4">
                        <span>
                            - {{$place->place}}
                        </span>
                    </div>

                    <div class="col-sm-4 col-xs-4 nav-price bg-green-5">
                        <span>
                            {{$place->price}}
                        </span>
                    </div>
                    @endforeach
                    <div class="col-sm-8 col-xs-8 nav-place-bottom bg-green-4">
                    </div>

                    <div class="col-sm-4 col-xs-4 nav-price-bottom bg-green-5">
                    </div>
                </div> 
            </div>




            <div class="col-sm-2 col-xs-12 bak-color">
                <div class="col-sm-12 col-xs-12 header-day bg-red-1">
                    <p>
                        ဗုဒၶဟူးေန ့
                    </p>
                </div>
                <div class="col-sm-8 col-xs-8 header-place bg-red-2">
                    <p>ေနရာ</p>                    
                </div>

                <div class="col-sm-4 col-xs-4 header-charge bg-red-3">
                    <p>
                        ပို ့ေဆာင္ခ</br>                        
                        (က်ပ္)
                    </p>
                </div>
                
                <div class="col-sm-12 col-xs-12 nav-list">
                    @foreach ($wed as $place)
                    <div class="col-sm-8 col-xs-8 nav-place bg-red-4">
                        <span>
                            - {{$place->place}}
                        </span>
                    </div>

                    <div class="col-sm-4 col-xs-4 nav-price bg-red-5">
                        <span>
                            {{$place->price}}
                        </span>
                    </div>
                    @endforeach
                    <div class="col-sm-8 col-xs-8 nav-place-bottom bg-red-4">
                    </div>

                    <div class="col-sm-4 col-xs-4 nav-price-bottom bg-red-5">
                    </div>
                </div> 
            </div>





            <div class="col-sm-2 col-xs-12 bak-color">
                <div class="col-sm-12 col-xs-12 header-day bg-blue-1">
                    <p>
                        ၾကာသပေတးေန ့
                    </p>
                </div>
                <div class="col-sm-8 col-xs-8 header-place bg-blue-2">
                    <p>ေနရာ</p>                    
                </div>

                <div class="col-sm-4 col-xs-4 header-charge bg-blue-3">
                    <p>
                        ပို ့ေဆာင္ခ</br>                        
                        (က်ပ္)
                    </p>
                </div>
                
                <div class="col-sm-12 col-xs-12 nav-list">
                    @foreach ($thur as $place)
                    <div class="col-sm-8 col-xs-8 nav-place bg-blue-4">
                        <span>
                            - {{$place->place}}
                        </span>
                    </div>

                    <div class="col-sm-4 col-xs-4 nav-price bg-blue-5">
                        <span>
                            {{$place->price}}
                        </span>
                    </div>
                    @endforeach
                    <div class="col-sm-8 col-xs-8 nav-place-bottom bg-blue-4">

                    </div>

                    <div class="col-sm-4 col-xs-4 nav-price-bottom bg-blue-5">

                    </div>
                </div> 
            </div>




            <div class="col-sm-2 col-xs-12 bak-color">
                <div class="col-sm-12 col-xs-12 header-day bg-green-1">
                    <p>
                        ေသာၾကာေန ့
                    </p>
                </div>
                <div class="col-sm-8 col-xs-8 header-place bg-green-2">
                    <p>ေနရာ</p>                    
                </div>

                <div class="col-sm-4 col-xs-4 header-charge bg-green-3">
                    <p>
                        ပို ့ေဆာင္ခ</br>                        
                        (က်ပ္)
                    </p>
                </div>
                
                <div class="col-sm-12 col-xs-12 nav-list">
                    @foreach ($fri as $place)
                    <div class="col-sm-8 col-xs-8 nav-place bg-green-4">
                        <span>
                            - {{$place->place}}
                        </span>
                    </div>

                    <div class="col-sm-4 col-xs-4 nav-price bg-green-5">
                        <span>
                            {{$place->price}}
                        </span>
                    </div>
                    @endforeach
                    <div class="col-sm-8 col-xs-8 nav-place-bottom bg-green-4">
                    </div>

                    <div class="col-sm-4 col-xs-4 nav-price-bottom bg-green-5">
                    </div>
                </div> 
            </div>




            <div class="col-sm-2 col-xs-12 bak-color">
                <div class="col-sm-12 col-xs-12 header-day bg-red-1">
                    <p>
                        စေနေန ့
                    </p>
                </div>
                <div class="col-sm-8 col-xs-8 header-place bg-red-2">
                    <p>ေနရာ</p>                    
                </div>

                <div class="col-sm-4 col-xs-4 header-charge bg-red-3">
                    <p>
                        ပို ့ေဆာင္ခ</br>                        
                        (က်ပ္)
                    </p>
                </div>
                
                <div class="col-sm-12 col-xs-12 nav-list">
                    @foreach ($sat as $place)
                    <div class="col-sm-8 col-xs-8 nav-place bg-red-4">
                        <span>
                            - {{$place->place}}
                        </span>
                    </div>

                    <div class="col-sm-4 col-xs-4 nav-price bg-red-5">
                        <span>
                            {{$place->price}}
                        </span>
                    </div>
                    @endforeach
                    <div class="col-sm-8 col-xs-8 nav-place-bottom bg-red-4">
                    </div>

                    <div class="col-sm-4 col-xs-4 nav-price-bottom bg-red-5">
                    </div>
                </div> 
            </div>




        </div>
    </div>
</div>
@endsection