@extends('layouts.app')

@section('content')

<!-- jQuery library (served from Google) -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="js/jquery.bxslider.min.js"></script>

<div class="content-grids">

    <ul class="bxslider">
        <script type="text/javascript"> 
        var j = jQuery.noConflict();
            j(document).ready(function(){  
                j('.bxslider').bxSlider({ 
                    captions: true,
                    slideWidth: 1000
                }); 
            });
        </script>
        @foreach($newMovies as $movie)

        <li><img src="files/{{$movie->imageRef}}" title="{{$movie->name}}" /></li>
        @endforeach
    </ul>

    <H3 style="margin-top: 0px;">Nuevos</H3>
    @foreach($newMovies as $key=>$movie)

    @if ($key % 4 == 0)
    <div class="content-grid last-grid">
        @else
        <div class="content-grid">
            @endif
            <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="files/{{$movie->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/></a>
            <h3 href="{{ action("MovieController@show", array($movie->id)) }}" style="margin-top: 0px; margin-bottom: 0px;">{{$movie->name}}</h3>
            @if(is_null($movie->rating))
                    <img src="img/rating/3_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/>
                @elseif ($movie->rating <= 0.4)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/0_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 1.0 && $movie->rating >= 0.5)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/0_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 1.5 && $movie->rating >= 1.0)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/1_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 2.0 && $movie->rating >= 1.5)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/1_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 2.5 && $movie->rating >= 2.0)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/2_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 3.0 && $movie->rating >= 2.5)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/2_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 3.5 && $movie->rating >= 3.0)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/3_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 4.0 && $movie->rating >= 3.5)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/3_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 4.5 && $movie->rating >= 4.0)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/4_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 5.0 && $movie->rating >= 4.5)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/4_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating >= 5.0)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/5_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @endif

            <a class="button" href="{{ action("MovieController@show", array($movie->id)) }}">Ver Ahora</a>
        </div>
        @endforeach

        <H3>Mas Vistos</H3>

        @foreach($visitMovies as $key=>$movie)

        @if ($key % 4 == 0)
        <div class="content-grid last-grid">
            @else
            <div class="content-grid">
                @endif
                <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="files/{{$movie->imageRef}}" title="{{$movie->name}}" style="width: 220px; height: 220px;"/></a>
                <a href="{{ action("MovieController@show", array($movie->id)) }}"><h3 href="{{ action("MovieController@show", array($movie->id)) }}" style="margin-top: 0px; margin-bottom: 0px;">{{$movie->name}}</h3></a>

                @if(is_null($movie->rating))
                    <img src="img/rating/3_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/>
                @elseif ($movie->rating <= 0.4)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/0_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 1.0 && $movie->rating >= 0.5)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/0_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 1.5 && $movie->rating >= 1.0)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/1_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 2.0 && $movie->rating >= 1.5)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/1_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 2.5 && $movie->rating >= 2.0)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/2_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 3.0 && $movie->rating >= 2.5)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/2_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 3.5 && $movie->rating >= 3.0)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/3_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 4.0 && $movie->rating >= 3.5)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/3_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 4.5 && $movie->rating >= 4.0)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/4_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 5.0 && $movie->rating >= 4.5)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/4_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating >= 5.0)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/5_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @endif



                <a class="button" href="{{ action("MovieController@show", array($movie->id)) }}">Ver Ahora</a>
            </div>
            @endforeach

    <H3>Mejor Evaluados</H3>
    @foreach($bestMovies as $key=>$movie)

    @if ($key % 4 == 0)
    <div class="content-grid last-grid">
        @else
        <div class="content-grid">
            @endif
            <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="files/{{$movie->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/></a>
            <h3 href="{{ action("MovieController@show", array($movie->id)) }}" style="margin-top: 0px; margin-bottom: 0px;">{{$movie->name}}</h3>
            @if(is_null($movie->rating))
                    <img src="img/rating/3_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/>
                @elseif ($movie->rating <= 0.4)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/0_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 1.0 && $movie->rating >= 0.5)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/0_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 1.5 && $movie->rating >= 1.0)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/1_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 2.0 && $movie->rating >= 1.5)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/1_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 2.5 && $movie->rating >= 2.0)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/2_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 3.0 && $movie->rating >= 2.5)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/2_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 3.5 && $movie->rating >= 3.0)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/3_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 4.0 && $movie->rating >= 3.5)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/3_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 4.5 && $movie->rating >= 4.0)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/4_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating < 5.0 && $movie->rating >= 4.5)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/4_5s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @elseif ($movie->rating >= 5.0)
                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="img/rating/5_0s.jpg" title="{{$movie->name}}" style="display: inline-block;"/></a>
                @endif
            
            <a class="button" href="{{ action("MovieController@show", array($movie->id)) }}">Ver Ahora</a>
        </div>
        @endforeach

        </div>
        @endsection

        @section('page-style-files')
        <link href="css/style.css" rel="stylesheet" type="text/css" /> 
        <link href="css/jquery.bxslider.css" rel="stylesheet" />
        @stop

{{--<div class="review-content"> 
<div class="reviews-section">
        <h3 class="head">Movie Reviews</h3>
        <div class="col-md-9 reviews-grids">
            @foreach($movies as $movie)
            <div class="review">
                <div class="movie-pic">

                    <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="files/{{$movie->imageRef}}" alt="" /></a>
                </div>
                <div class="review-info"> --}}
                    {{--{!!link_to_route('pelicula.play', $movie->name, $parameters = $movie->id, $attributes = ['class'=>'span'])!!}--}}
                    {{--link_to_route('route.name', $title = null, $parameters = array(), $attributes = array());--}}
                    {{-- <a class="span" href="{{ action("MovieController@show", array($movie->id)) }}"> <i>{{$movie->name}}</i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            @endforeach
        </div>

        <div class="clearfix"></div>
    </div>
</div> --}}