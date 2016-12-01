@extends('layouts.appTrue')

@section('content')

<link href="css/style.css" rel="stylesheet" type="text/css" /> 
<div class="content-grids">

@if (count($movies) === 0)
... html showing no articles found
@elseif (count($movies) >= 1)

<H3 style="margin-top: 0px;">Resultados</H3>
    @foreach($movies as $key=>$movie)
    @if ($key % 4 == 3)
    	<div class="content-grid last-grid">
    @else
        <div class="content-grid">
    @endif
        <a href="{{ action("MovieController@show", array($movie->id)) }}"><img src="files/{{$movie->imageRef}}" title="allbum-name" style="width: 220px; height: 220px;"/></a>
        <h3 href="{{ action("MovieController@show", array($movie->id)) }}" style="margin-top: 0px; margin-bottom: 0px;">{{$movie->name}}</h3>
        <a class="button" href="{{ action("MovieController@show", array($movie->id)) }}">Ver Ahora</a>
        </div>
    @endforeach
    </div>
@endif
@endsection



{{-- {!! Form::open(['method'=>'GET','url'=>'offices','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
<a href="{{ url('offices/create') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add</a>
 
<div class="input-group custom-search-form">
    <input type="text" class="form-control" name="search" placeholder="Search...">
    <span class="input-group-btn">
        <button class="btn btn-default-sm" type="submit">
            <i class="fa fa-search"><!--<span class="hiddenGrammarError" pre="" data-mce-bogus="1"-->i>
        </button>
    </span>
</div>
{!! Form::close() !!} --}}
