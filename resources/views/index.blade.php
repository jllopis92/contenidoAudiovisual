@extends('layouts.app')

@section('content')

<link href="css/style.css" rel="stylesheet" type="text/css" /> 
<div class="content-grids">


    <H3 style="margin-top: 0px;">Nuevos</H3>
    @foreach($newMovies as $key=>$movie)
    
    @if ($key % 4 == 0)
    <div class="content-grid last-grid">
        @else
        <div class="content-grid">
    @endif
        <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="files/{{$movie->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/></a>
        <h3 href="{{ action("MovieController@show", array($movie->id)) }}" style="margin-top: 0px; margin-bottom: 0px;">{{$movie->name}}</h3>
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
        <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="files/{{$movie->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/></a>
        <h3 href="{{ action("MovieController@show", array($movie->id)) }}" style="margin-top: 0px; margin-bottom: 0px;">{{$movie->name}}</h3>
        <a class="button" href="{{ action("MovieController@show", array($movie->id)) }}">Ver Ahora</a>
        </div>
    @endforeach

        <H3>DRAMA </H3>
        <div class="content-grid">
            <a href="singlepage.html"><img src="images/gridallbum1.jpg" title="allbum-name" /></a>
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
            <a class="button" href="singlepage.html">Watch now</a>
        </div>
        <div class="content-grid">
            <a href="singlepage.html"><img src="images/gridallbum2.jpg" title="allbum-name" /></a>
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
            <a class="button" href="singlepage.html">Watch now</a>
        </div>
        <div class="content-grid">
            <a href="singlepage.html"><img src="images/gridallbum2.jpg" title="allbum-name" /></a>
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
            <a class="button" href="singlepage.html">Watch now</a>
        </div>
        <div class="content-grid last-grid">
            <a href="singlepage.html"><img src="images/gridallbum2.jpg" title="allbum-name" /></a>
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
            <a class="button" href="singlepage.html">Watch now</a>
        </div>

        <H3>ACCIÓN </H3>
        <div class="content-grid">
            <a href="singlepage.html"><img src="images/gridallbum1.jpg" title="allbum-name" /></a>
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
            <a class="button" href="singlepage.html">Watch now</a>
        </div>
        <div class="content-grid">
            <a href="singlepage.html"><img src="images/gridallbum2.jpg" title="allbum-name" /></a>
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
            <a class="button" href="singlepage.html">Watch now</a>
        </div>
        <div class="content-grid">
            <a href="singlepage.html"><img src="images/gridallbum2.jpg" title="allbum-name" /></a>
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
            <a class="button" href="singlepage.html">Watch now</a>
        </div>
        <div class="content-grid last-grid">
            <a href="singlepage.html"><img src="images/gridallbum2.jpg" title="allbum-name" /></a>
            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h3>
            <a class="button" href="singlepage.html">Watch now</a>
        </div>
    </div>
    @endsection

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