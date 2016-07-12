@if (count($movies) === 0)
... html showing no articles found
@elseif (count($movies) >= 1)
... print out results
    @foreach($movies as $movie)
    <h3 style="margin-top: 0px; margin-bottom: 0px;">{{$movie->name}}</h3>
    @endforeach
@endif


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
