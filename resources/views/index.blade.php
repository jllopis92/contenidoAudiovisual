@extends('layouts.mainApp')
@section('content')

	<div class="col-md-12 " id="mainBody" style="overflow: hidden; background-color: #f8f8f8; max-width: 800px;
    border-color: #e7e7e7;">
	    <div class="col-xs-12 col-sm-12 col-md-12">
	    	<H3>Nuevos</H3>
	    </div> 
    @foreach($newMovies as $key=>$movie)

		    {{-- @if ($key % 4 == 3)
		    <div class="content-grid last-grid col-xs-12 col-sm-6 col-md-3" style="padding-left: 0px; padding-right: 0px;">
		    	@else --}}
		    	<div class="col-xs-12 col-sm-6 col-md-4" style="padding: 5px; margin: 5px; width: 220px;">
		    		<div class="col-md-12">
		    			<a href="{{ action("MovieController@show", array($movie->id)) }}">
		    				<img src="files/{{$movie->imageRef}}" 
		    				title="{{$movie->name}}" 
		    				style="width: 180px;
		    				height: 110px;"/>
		    			</a>
		    		</div>
		    		<div class="col-md-12" align="middle" style="margin-top: 5px;">
		    			<a href="{{ action("MovieController@show", array($movie->id)) }}"><h3 href="{{ action("MovieController@show", array($movie->id)) }}" style="color:#337ab7; font-size: 14px; margin-top: 0px; margin-bottom: 0px;">{{$movie->name}}</h3>
		    			</a>
		    		</div>
		    		<div class="col-md-12" align="middle" style="width: 100%">
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
		    		</div>
		    		<div class="col-md-12" align="middle" onclick="openInfo('{{$key}}', '{{$movie->id}}', '{{$movie->name}}', '{{$movie->duration}}', '{{$movie->language}}', '{{$movie->category}}', '{{$movie->category2}}', '{{$movie->production_year}}', '{{$movie->description}}' );">
		    			<a class="button" id="info" >Mas Información</a>
		    		</div>
		    	</div>

		    	@if ($key == 2)
		    	<ul class="col-md-12" id="showInfo" style="display: none;">
			    	<div id="slideContainer" class="slideContainer">
	                    <strong class="slideTitle" id="slideTitle"></strong>
	                    <div class="slideBody" style="text-align: left;">
	                      	<ul>
		                        <li>
		                            <div class="messageblock">
		                              	<div class="message">Duración: 
		                              		<strong id="duration"></strong>
		                              	</div>
		                            </div>
		                        </li>
		                        <li>
		                            <div class="message">Idioma: 
		                            	<strong id="languaje"></strong>
		                            </div>
		                        </li>
		                        <li>
		                            <div class="message">Categorias: 
		                            	<strong id="categories"></strong>
		                            </div>
		                        </li>
		                        <li>
		                            <div class="message">Año de Producción: 
		                            	<strong id="year"></strong>
		                            </div>
		                        </li>
		                        <li>
		                            <div class="messageinfo" id="description">
		                            </div>
		                        </li>
	                      	</ul>
	                    </div>
	                    <a id="watchNow">
	                      <div id="notificationFooter">Ver Ahora</div>
	                    </a>
	                </div>
		    	</ul>
		    	@endif
		    	@if ($key == 5)
		    	<ul class="col-md-12" id="showInfo2" style="display: none;">
		    		<div id="slideContainer2" class="slideContainer">
                    <div class="slideTitle" id="slideTitle2"></div>
                    <div class="slideBody" style="text-align: left;">
	                    <ul>
	                      	<li>
	                      		<div class="messageblock">
	                      			<div class="message">Duración: 
	                      				<strong id="duration2"></strong>
	                      			</div>
	                      		</div>
	                      	</li>
	                      	<li>
	                      		<div class="message">Idioma: 
	                      			<strong id="languaje2"></strong>
	                      		</div>
	                      	</li>
	                      	<li>
	                      		<div class="message">Categorias: 
	                      			<strong id="categories2"></strong>
	                      		</div>
	                      	</li>
	                      	<li>
	                      		<div class="message">Año de Producción: 
	                      			<strong id="year2"></strong>
	                      		</div>
	                      	</li>
	                      	<li>
	                      		<div class="messageinfo" id="description2">
	                      		</div>
	                      	</li>
	                    </ul>
                    </div>
                    <a id="watchNow2">
                      <div id="notificationFooter">Ver Ahora</div>
                    </a>
                </div>
		    	</ul>
		    	@endif
		    		
	@endforeach
				

    	<div class="col-xs-12 col-sm-12 col-md-12">
          <H3>Mas Vistos</H3>
        </div>

        @foreach($visitMovies as $key=>$movie)

        	@if ($key < 3)
	        	<div class="content-grid col-xs-12 col-sm-6 col-md-3" style="padding: 5px; margin: 5px; width: 220px;">
	        		<div class="col-md-12" align="middle">
		        		<a href="{{ action("MovieController@show", array($movie->id)) }}">
		                	<img src="files/{{$movie->imageRef}}" 
		                  	title="{{$movie->name}}" 
		                  	style="width: 180px;
		                       	   height: 110px;"/>
		                </a>
	                </div>
	                <div class="col-md-12" align="middle">
		                <a href="{{ action("MovieController@show", array($movie->id)) }}"><h3 href="{{ action("MovieController@show", array($movie->id)) }}" style="color:#999999; font-size: 15px; margin-top: 0px; margin-bottom: 0px;">{{$movie->name}}</h3>
		                </a>
	                </div>
	                <div class="col-md-12" align="middle">
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
		            </div>
		            <div class="col-md-12" align="middle">
		            	<a class="button" href="{{ action("MovieController@show", array($movie->id)) }}">Mas Información</a>
		            </div>
	        	</div>
	        @elseif ($key == 3)	
	        	<div class="content-grid last-grid col-xs-12 col-sm-6 col-md-3" style="padding: 5px; margin: 5px; width: 220px;">
	        		<div class="col-md-12" align="middle">
		        		<a href="{{ action("MovieController@show", array($movie->id)) }}">
		                	<img src="files/{{$movie->imageRef}}" 
		                  	title="{{$movie->name}}" 
		                  	style="width: 180px;
		                       	   height: 110px;"/>
		                </a>
	                </div>
	                <div class="col-md-12" align="middle">
		                <a href="{{ action("MovieController@show", array($movie->id)) }}"><h3 href="{{ action("MovieController@show", array($movie->id)) }}" style="color:#999999; font-size: 15px; margin-top: 0px; margin-bottom: 0px;">{{$movie->name}}</h3>
		                </a>
	                </div>
	                <div class="col-md-12" align="middle">
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
		            </div>
		            <div class="col-md-12" align="middle">
		            	<a class="button" href="{{ action("MovieController@show", array($movie->id)) }}">Mas Información</a>
		            </div>
	        	</div>
	    	@endif
	    @endforeach
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <H3>Mejor Evaluados</H3>
        </div>
        @foreach($bestMovies as $key=>$movie)
        	@if ($key < 3)
	        	<div class="content-grid col-xs-12 col-sm-6 col-md-3" style="padding: 5px; margin: 5px; width: 220px;">
	        		<div class="col-md-12" align="middle">
		        		<a href="{{ action("MovieController@show", array($movie->id)) }}">
		                	<img src="files/{{$movie->imageRef}}" 
		                  	title="{{$movie->name}}" 
		                  	style="width: 180px;
		                       	   height: 110px;"/>
		                </a>
	                </div>
	                <div class="col-md-12" align="middle">
		                <a href="{{ action("MovieController@show", array($movie->id)) }}"><h3 href="{{ action("MovieController@show", array($movie->id)) }}" style="color:#999999; font-size: 15px; margin-top: 0px; margin-bottom: 0px;">{{$movie->name}}</h3>
		                </a>
	                </div>
	                <div class="col-md-12" align="middle">
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
		            </div>
		            <div class="col-md-12" align="middle">
		            	<a class="button" href="{{ action("MovieController@show", array($movie->id)) }}">Mas Información</a>
		            </div>
	        	</div>
	        @elseif ($key == 3)	
	        	<div class="content-grid last-grid col-xs-12 col-sm-6 col-md-3" style="padding: 5px; margin: 5px; width: 220px;">
	        		<div class="col-md-12" align="middle">
		        		<a href="{{ action("MovieController@show", array($movie->id)) }}">
		                	<img src="files/{{$movie->imageRef}}" 
		                  	title="{{$movie->name}}" 
		                  	style="width: 180px;
		                       	   height: 110px;"/>
		                </a>
	                </div>
	                <div class="col-md-12" align="middle">
		                <a href="{{ action("MovieController@show", array($movie->id)) }}"><h3 href="{{ action("MovieController@show", array($movie->id)) }}" style="color:#999999; font-size: 15px; margin-top: 0px; margin-bottom: 0px;">{{$movie->name}}</h3>
		                </a>
	                </div>
	                <div class="col-md-12" align="middle">
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
		            </div>
		            <div class="col-md-12" align="middle">
		            	<a class="button" href="{{ action("MovieController@show", array($movie->id)) }}">Mas Información</a>
		            </div>
	        	</div>
	    	@endif
        @endforeach
    </div>
@endsection

@section('page-style-files')
@stop

@section('page-js-files')
@stop

@section('page-js-script')

<script type="text/javascript">
	function openInfo(key, id, name, duration, language, category, category2, production_year, description) {
		if(key <= 2){
			var actual = document.getElementById("showInfo");
            if (actual.style.display === 'none') {
            	var slideTitleText = document.getElementById("slideTitle");
            	var durationText = document.getElementById("duration");
            	var languajeText = document.getElementById("languaje");
            	var categoriesText = document.getElementById("categories");
            	var yearText = document.getElementById("year");
            	var descriptionText = document.getElementById("description");

            	slideTitleText.innerHTML = name;
            	durationText.innerHTML = duration;
            	languajeText.innerHTML = language;
            	categoriesText.innerHTML = category + ", " + category2;
            	yearText.innerHTML = production_year;
            	descriptionText.innerHTML = description;

            	document.getElementById("watchNow").href="/upload/"+id;
            	
			    actual.style.display = 'block';
			} else {
			    actual.style.display = 'none';
			}             
        }else{
        	var actual2 = document.getElementById("showInfo2");
            if (actual2.style.display === 'none') {
            	var slideTitleText = document.getElementById("slideTitle2");
            	var durationText = document.getElementById("duration2");
            	var languajeText = document.getElementById("languaje2");
            	var categoriesText = document.getElementById("categories2");
            	var yearText = document.getElementById("year2");
            	var descriptionText = document.getElementById("description2");

            	document.getElementById("watchNow2").href="/upload/"+id;

            	slideTitleText.innerHTML = name;
            	durationText.innerHTML = duration;
            	languajeText.innerHTML = language;
            	categoriesText.innerHTML = category + ", " + category2;
            	yearText.innerHTML = production_year;
            	descriptionText.innerHTML = description;

			    actual2.style.display = 'block';
			} else {
			    actual2.style.display = 'none';
			}   
        }
	}
</script>
@stop