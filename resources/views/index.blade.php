@extends('layouts.mainApp')
@section('content')

	<div class="col-sm-12" id="mainBody" align="center" style="overflow: hidden; 
	background-color: #ffffff;
    border-color: #e7e7e7;">

    <div id="immersive_slider" class="col-xs-12">
        @foreach($advertisings as $advertising)
          <div class="slide col-xs-12" data-blurred="files/{{$advertising->image}}">
            <div class="content col-xs-12 col-md-6">
              <h2><a href="{{ action("MovieController@show", array($advertising->movie_id)) }}" target="_blank">{{$advertising->name}}</a></h2>
              <p>{{$advertising->description}}</p>
            </div>
            <div class="image col-xs-12 col-md-6">
              <a href="{{ action("MovieController@show", array($advertising->movie_id)) }}" target="_blank">
                <img src="files/{{$advertising->image}}" alt="Slider 1">
              </a>
            </div>
          </div>
        @endforeach
          
        <a href="#" class="is-prev">&laquo;</a>
        <a href="#" class="is-next">&raquo;</a>
    </div>
        

	    <div class="col-xs-12 col-sm-12 col-md-12 boldFont orangeText" style="padding-left: 25px;" align="left">
	    	<H3>Nuevos</H3>
	    </div> 
    	@foreach($newMovies as $key=>$movie)
    		@if($key <= 5)
		    <div id="movieContent{{$movie->id}}" class="col-xs-12 col-sm-4 col-md-3" style="padding-left: 0px;">
			    <div style="padding: 5px; margin: 5px; width: 220px;">
			    	<div class="col-md-12">
			    		<a href="{{ action("MovieController@show", array($movie->id)) }}">
			    			<img src="files/{{$movie->imageRef}}" 
			    			title="{{$movie->name}}" 
			    			style="width: 180px;
			    			height: 110px;"/>
			    		</a>
			    	</div>
			    	<div class="row col-xs-12" style="margin-top: 5px; height: 40px;">
			    		<div class="col-xs-9" align="left" style="padding-right: 0px;">
			    			<a class="blackAndBoldText" href="{{ action("MovieController@show", array($movie->id)) }}">
			    				<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px; max-width: 120px">{{$movie->name}}
			    			</a>
			    		</div>
			    		<div class="col-xs-2 col-xs-offset-1" align="right" style="padding-right: 0px; padding-left: 5px;">
				    		<a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
				    			<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px;">{{$movie->production_year}}</p>
				    		</a>
			    		</div>
			    	</div>
			    	<div class="row col-xs-12" style="margin-top: 5px;">
			    		<div class="col-xs-7" align="left" style="padding-right: 0px;">
			    			<a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
			    				<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px; max-width: 120px">{{$movie->category2}}
			    			</a>
			    		</div>
			    		<div class="col-xs-4 col-xs-offset-1" align="right" style="padding-right: 0px; padding-left: 5px;">
				    		<a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
				    			<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px;">{{$movie->duration}}</p>
				    		</a>
			    		</div>
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
			    	<div class="col-md-12" align="middle" onclick="openInfo('new','{{$key}}', '{{$movie->id}}', '{{$movie->name}}', '{{$movie->duration}}', '{{$movie->language}}', '{{$movie->type_id}}', '{{$movie->genre_id}}', '{{$movie->production_year}}', '{{$movie->description}}' );">
			    		<a class="button orangeAndBoldText" id="info" >Mas Información</a>
			    	</div>
			    </div>
			</div>
			<ul class="col-xs-10 col-xs-offset-1 col-sm-10 orangeBorder" id="newShowInfo{{$key}}" style="display: none; margin-top: 10px;">
				<div id="newSlideContainer" class="slideContainer" style="margin-top: 10px;">
					<div class="col-xs-12">
						<strong class="slideTitle orangeAndBoldText" style="font-size: 16px;" id="newSlideTitle{{$key}}"></strong>
						<div class="slideBody" style="text-align: left;">
							<ul>
								<li>
									<div class="messageblock">
										<div class="message">Duración: 
											<strong id="newDuration{{$key}}"></strong>
										</div>
									</div>
								</li>
								<li>
									<div class="message">Idioma: 
										<strong id="newLanguage{{$key}}"></strong>
									</div>
								</li>
								<li>
									<div class="message">Categorias: 
										<strong id="newCategories{{$key}}"></strong>
									</div>
								</li>
								<li>
									<div class="message">Año de Producción: 
										<strong id="newYear{{$key}}"></strong>
									</div>
								</li>
								<li>
									<div class="messageinfo" id="newDescription{{$key}}">
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xs-12">
						<a class="orangeAndBoldText" style="font-size: 16px; margin-bottom: 10px;" id="newWatchNow{{$key}}">
							<div id="newNotificationFooter">Ver Ahora</div>
						</a>
					</div>
				</div>
			</ul>
			@else
				<div id="movieContent{{$movie->id}}" class="col-md-3 hidden-sm hidden-xs" style="padding-left: 0px;">
				    <div style="padding: 5px; margin: 5px; width: 220px;">
				    	<div class="col-md-12">
				    		<a href="{{ action("MovieController@show", array($movie->id)) }}">
				    			<img src="files/{{$movie->imageRef}}" 
				    			title="{{$movie->name}}" 
				    			style="width: 180px;
				    			height: 110px;"/>
				    		</a>
				    	</div>
				    	<div class="row col-xs-12" style="margin-top: 5px; height: 40px;">
				    		<div class="col-xs-9" align="left" style="padding-right: 0px;">
				    			<a class="blackAndBoldText" href="{{ action("MovieController@show", array($movie->id)) }}">
				    				<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px; max-width: 120px">{{$movie->name}}
				    			</a>
				    		</div>
				    		<div class="col-xs-2 col-xs-offset-1" align="right" style="padding-right: 0px; padding-left: 5px;">
					    		<a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
					    			<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px;">{{$movie->production_year}}</p>
					    		</a>
				    		</div>
				    	</div>
				    	<div class="row col-xs-12" style="margin-top: 5px;">
				    		<div class="col-xs-7" align="left" style="padding-right: 0px;">
				    			<a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
				    				<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px; max-width: 120px">{{$movie->category2}}
				    			</a>
				    		</div>
				    		<div class="col-xs-4 col-xs-offset-1" align="right" style="padding-right: 0px; padding-left: 5px;">
					    		<a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
					    			<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px;">{{$movie->duration}}</p>
					    		</a>
				    		</div>
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
				    	<div class="col-md-12" align="middle" onclick="openInfo('new','{{$key}}', '{{$movie->id}}', '{{$movie->name}}', '{{$movie->duration}}', '{{$movie->language}}', '{{$movie->category}}', '{{$movie->category2}}', '{{$movie->production_year}}', '{{$movie->description}}' );">
				    		<a class="button orangeAndBoldText" id="info" >Mas Información</a>
				    	</div>
				    </div>
				</div>
				<ul class="col-xs-10 col-xs-offset-1 col-sm-10 orangeBorder" id="newShowInfo{{$key}}" style="display: none; margin-top: 10px;">
					<div id="newSlideContainer" class="slideContainer" style="margin-top: 10px;">
						<div class="col-xs-12">
							<strong class="slideTitle orangeAndBoldText" style="font-size: 16px;" id="newSlideTitle{{$key}}"></strong>
							<div class="slideBody" style="text-align: left;">
								<ul>
									<li>
										<div class="messageblock">
											<div class="message">Duración: 
												<strong id="newDuration{{$key}}"></strong>
											</div>
										</div>
									</li>
									<li>
										<div class="message">Idioma: 
											<strong id="newLanguage{{$key}}"></strong>
										</div>
									</li>
									<li>
										<div class="message">Categorias: 
											<strong id="newCategories{{$key}}"></strong>
										</div>
									</li>
									<li>
										<div class="message">Año de Producción: 
											<strong id="newYear{{$key}}"></strong>
										</div>
									</li>
									<li>
										<div class="messageinfo" id="newDescription{{$key}}">
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-xs-12">
							<a class="orangeAndBoldText" style="font-size: 16px; margin-bottom: 10px;" id="newWatchNow{{$key}}">
								<div id="newNotificationFooter">Ver Ahora</div>
							</a>
						</div>
					</div>
				</ul>
			@endif
		@endforeach
				

    	<div class="col-xs-12 col-sm-12 col-md-12 boldFont orangeText" style="padding-left: 25px;" align="left">
          <H3>Mas Vistos</H3>
        </div>
        @foreach($visitMovies as $key=>$movie)
		    @if($key <= 5)
		    <div id="movieContent{{$movie->id}}" class="col-xs-12 col-sm-4 col-md-3" style="padding-left: 0px;">
			    <div style="padding: 5px; margin: 5px; width: 220px;">
			    	<div class="col-md-12">
			    		<a href="{{ action("MovieController@show", array($movie->id)) }}">
			    			<img src="files/{{$movie->imageRef}}" 
			    			title="{{$movie->name}}" 
			    			style="width: 180px;
			    			height: 110px;"/>
			    		</a>
			    	</div>
			    	<div class="row col-xs-12" style="margin-top: 5px; height: 40px;">
			    		<div class="col-xs-9" align="left" style="padding-right: 0px;">
			    			<a class="blackAndBoldText" href="{{ action("MovieController@show", array($movie->id)) }}">
			    				<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px; max-width: 120px">{{$movie->name}}
			    			</a>
			    		</div>
			    		<div class="col-xs-2 col-xs-offset-1" align="right" style="padding-right: 0px; padding-left: 5px;">
				    		<a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
				    			<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px;">{{$movie->production_year}}</p>
				    		</a>
			    		</div>
			    	</div>
			    	<div class="row col-xs-12" style="margin-top: 5px;">
			    		<div class="col-xs-7" align="left" style="padding-right: 0px;">
			    			<a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
			    				<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px; max-width: 120px">{{$movie->category2}}
			    			</a>
			    		</div>
			    		<div class="col-xs-4 col-xs-offset-1" align="right" style="padding-right: 0px; padding-left: 5px;">
				    		<a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
				    			<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px;">{{$movie->duration}}</p>
				    		</a>
			    		</div>
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
			    	<div class="col-md-12" align="middle" onclick="openInfo('view','{{$key}}', '{{$movie->id}}', '{{$movie->name}}', '{{$movie->duration}}', '{{$movie->language}}', '{{$movie->type_id}}', '{{$movie->genre_id}}', '{{$movie->production_year}}', '{{$movie->description}}' );">
			    		<a class="button orangeAndBoldText" id="info" >Mas Información</a>
			    	</div>
			    </div>
			</div>
			<ul class="col-xs-10 col-xs-offset-1 col-sm-10 orangeBorder" id="viewShowInfo{{$key}}" style="display: none; margin-top: 10px;">
				<div id="viewSlideContainer" class="slideContainer" style="margin-top: 10px;">
					<div class="col-xs-12">
						<strong class="slideTitle orangeAndBoldText" style="font-size: 16px;" id="viewSlideTitle{{$key}}"></strong>
						<div class="slideBody" style="text-align: left;">
							<ul>
								<li>
									<div class="messageblock">
										<div class="message">Duración: 
											<strong id="viewDuration{{$key}}"></strong>
										</div>
									</div>
								</li>
								<li>
									<div class="message">Idioma: 
										<strong id="viewLanguage{{$key}}"></strong>
									</div>
								</li>
								<li>
									<div class="message">Categorias: 
										<strong id="viewCategories{{$key}}"></strong>
									</div>
								</li>
								<li>
									<div class="message">Año de Producción: 
										<strong id="viewYear{{$key}}"></strong>
									</div>
								</li>
								<li>
									<div class="messageinfo" id="viewDescription{{$key}}">
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xs-12">
						<a class="orangeAndBoldText" style="font-size: 16px; margin-bottom: 10px;" id="viewWatchNow{{$key}}">
							<div id="viewNotificationFooter">Ver Ahora</div>
						</a>
					</div>
				</div>
			</ul>
			@else
				<div id="movieContent{{$movie->id}}" class="col-md-3 hidden-sm hidden-xs" style="padding-left: 0px;">
				    <div style="padding: 5px; margin: 5px; width: 220px;">
				    	<div class="col-md-12">
				    		<a href="{{ action("MovieController@show", array($movie->id)) }}">
				    			<img src="files/{{$movie->imageRef}}" 
				    			title="{{$movie->name}}" 
				    			style="width: 180px;
				    			height: 110px;"/>
				    		</a>
				    	</div>
				    	<div class="row col-xs-12" style="margin-top: 5px; height: 40px;">
				    		<div class="col-xs-9" align="left" style="padding-right: 0px;">
				    			<a class="blackAndBoldText" href="{{ action("MovieController@show", array($movie->id)) }}">
				    				<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px; max-width: 120px">{{$movie->name}}
				    			</a>
				    		</div>
				    		<div class="col-xs-2 col-xs-offset-1" align="right" style="padding-right: 0px; padding-left: 5px;">
					    		<a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
					    			<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px;">{{$movie->production_year}}</p>
					    		</a>
				    		</div>
				    	</div>
				    	<div class="row col-xs-12" style="margin-top: 5px;">
				    		<div class="col-xs-7" align="left" style="padding-right: 0px;">
				    			<a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
				    				<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px; max-width: 120px">{{$movie->category2}}
				    			</a>
				    		</div>
				    		<div class="col-xs-4 col-xs-offset-1" align="right" style="padding-right: 0px; padding-left: 5px;">
					    		<a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
					    			<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px;">{{$movie->duration}}</p>
					    		</a>
				    		</div>
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

				    	<div class="col-md-12" align="middle" onclick="openInfo('view','{{$key}}', '{{$movie->id}}', '{{$movie->name}}', '{{$movie->duration}}', '{{$movie->language}}', '{{$movie->type_id}}', '{{$movie->genre_id}}', '{{$movie->production_year}}', '{{$movie->description}}' );">
				    		<a class="button orangeAndBoldText" id="info" >Mas Información</a>
				    	</div>
				    </div>
				</div>
				<ul class="col-xs-10 col-xs-offset-1 col-sm-10 orangeBorder" id="viewShowInfo{{$key}}" style="display: none; margin-top: 10px;">
					<div id="viewSlideContainer" class="slideContainer" style="margin-top: 10px;">
						<div class="col-xs-12">
							<strong class="slideTitle orangeAndBoldText" style="font-size: 16px;" id="viewSlideTitle{{$key}}"></strong>
							<div class="slideBody" style="text-align: left;">
								<ul>
									<li>
										<div class="messageblock">
											<div class="message">Duración: 
												<strong id="viewDuration{{$key}}"></strong>
											</div>
										</div>
									</li>
									<li>
										<div class="message">Idioma: 
											<strong id="viewLanguage{{$key}}"></strong>
										</div>
									</li>
									<li>
										<div class="message">Categorias: 
											<strong id="viewCategories{{$key}}"></strong>
										</div>
									</li>
									<li>
										<div class="message">Año de Producción: 
											<strong id="viewYear{{$key}}"></strong>
										</div>
									</li>
									<li>
										<div class="messageinfo" id="viewDescription{{$key}}">
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-xs-12">
							<a class="orangeAndBoldText" style="font-size: 16px; margin-bottom: 10px;" id="viewWatchNow{{$key}}">
								<div id="newNotificationFooter">Ver Ahora</div>
							</a>
						</div>
					</div>
				</ul>
			@endif
		@endforeach
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12 boldFont orangeText" style="padding-left: 25px;" align="left">
            <H3>Mejor Evaluados</H3>
        </div>
        @foreach($bestMovies as $key=>$movie)
		    @if($key <= 5)
		    <div id="movieContent{{$movie->id}}" class="col-xs-12 col-sm-4 col-md-3" style="padding-left: 0px;">
			    <div style="padding: 5px; margin: 5px; width: 220px;">
			    	<div class="col-md-12">
			    		<a href="{{ action("MovieController@show", array($movie->id)) }}">
			    			<img src="files/{{$movie->imageRef}}" 
			    			title="{{$movie->name}}" 
			    			style="width: 180px;
			    			height: 110px;"/>
			    		</a>
			    	</div>
			    	<div class="row col-xs-12" style="margin-top: 5px; height: 40px;">
			    		<div class="col-xs-9" align="left" style="padding-right: 0px;">
			    			<a class="blackAndBoldText" href="{{ action("MovieController@show", array($movie->id)) }}">
			    				<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px; max-width: 120px">{{$movie->name}}
			    			</a>
			    		</div>
			    		<div class="col-xs-2 col-xs-offset-1" align="right" style="padding-right: 0px; padding-left: 5px;">
				    		<a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
				    			<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px;">{{$movie->production_year}}</p>
				    		</a>
			    		</div>
			    	</div>
			    	<div class="row col-xs-12" style="margin-top: 5px;">
			    		<div class="col-xs-7" align="left" style="padding-right: 0px;">
			    			<a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
			    				<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px; max-width: 120px">{{$movie->category2}}
			    			</a>
			    		</div>
			    		<div class="col-xs-4 col-xs-offset-1" align="right" style="padding-right: 0px; padding-left: 5px;">
				    		<a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
				    			<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px;">{{$movie->duration}}</p>
				    		</a>
			    		</div>
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
			    	<div class="col-md-12" align="middle" onclick="openInfo('best','{{$key}}', '{{$movie->id}}', '{{$movie->name}}', '{{$movie->duration}}', '{{$movie->language}}', '{{$movie->type_id}}', '{{$movie->genre_id}}', '{{$movie->production_year}}', '{{$movie->description}}' );">
			    		<a class="button orangeAndBoldText" id="info" >Mas Información</a>
			    	</div>
			    </div>
			</div>
			<ul class="col-xs-10 col-xs-offset-1 col-sm-10 orangeBorder" id="bestShowInfo{{$key}}" style="display: none; margin-top: 10px;">
				<div id="bestSlideContainer" class="slideContainer" style="margin-top: 10px;">
					<div class="col-xs-12">
						<strong class="slideTitle orangeAndBoldText" style="font-size: 16px;" id="bestSlideTitle{{$key}}"></strong>
						<div class="slideBody" style="text-align: left;">
							<ul>
								<li>
									<div class="messageblock">
										<div class="message">Duración: 
											<strong id="bestDuration{{$key}}"></strong>
										</div>
									</div>
								</li>
								<li>
									<div class="message">Idioma: 
										<strong id="bestLanguage{{$key}}"></strong>
									</div>
								</li>
								<li>
									<div class="message">Categorias: 
										<strong id="bestCategories{{$key}}"></strong>
									</div>
								</li>
								<li>
									<div class="message">Año de Producción: 
										<strong id="bestYear{{$key}}"></strong>
									</div>
								</li>
								<li>
									<div class="messageinfo" id="bestDescription{{$key}}">
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xs-12">
						<a class="orangeAndBoldText" style="font-size: 16px; margin-bottom: 10px;" id="bestWatchNow{{$key}}">
							<div id="bestNotificationFooter">Ver Ahora</div>
						</a>
					</div>
				</div>
			</ul>
			@else
				<div id="movieContent{{$movie->id}}" class="col-md-3 hidden-sm hidden-xs" style="padding-left: 0px;">
				    <div style="padding: 5px; margin: 5px; width: 220px;">
				    	<div class="col-md-12">
				    		<a href="{{ action("MovieController@show", array($movie->id)) }}">
				    			<img src="files/{{$movie->imageRef}}" 
				    			title="{{$movie->name}}" 
				    			style="width: 180px;
				    			height: 110px;"/>
				    		</a>
				    	</div>
				    	<div class="row col-xs-12" style="margin-top: 5px; height: 40px;">
				    		<div class="col-xs-9" align="left" style="padding-right: 0px;">
				    			<a class="blackAndBoldText" href="{{ action("MovieController@show", array($movie->id)) }}">
				    				<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px; max-width: 120px">{{$movie->name}}
				    			</a>
				    		</div>
				    		<div class="col-xs-2 col-xs-offset-1" align="right" style="padding-right: 0px; padding-left: 5px;">
					    		<a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
					    			<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px;">{{$movie->production_year}}</p>
					    		</a>
				    		</div>
				    	</div>
				    	<div class="row col-xs-12" style="margin-top: 5px;">
				    		<div class="col-xs-7" align="left" style="padding-right: 0px;">
				    			<a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
				    				<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px; max-width: 120px">{{$movie->category2}}
				    			</a>
				    		</div>
				    		<div class="col-xs-4 col-xs-offset-1" align="right" style="padding-right: 0px; padding-left: 5px;">
					    		<a class="blackText" href="{{ action("MovieController@show", array($movie->id)) }}">
					    			<p href="{{ action("MovieController@show", array($movie->id)) }}" style="font-size: 14px; margin-top: 0px; margin-bottom: 0px;">{{$movie->duration}}</p>
					    		</a>
				    		</div>
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
				    	<div class="col-md-12" align="middle" onclick="openInfo('best','{{$key}}', '{{$movie->id}}', '{{$movie->name}}', '{{$movie->duration}}', '{{$movie->language}}', '{{$movie->type_id}}', '{{$movie->genre_id}}', '{{$movie->production_year}}', '{{$movie->description}}' );">
				    		<a class="button orangeAndBoldText" id="info" >Mas Información</a>
				    	</div>
				    </div>
				</div>
				<ul class="col-xs-10 col-xs-offset-1 col-sm-10 orangeBorder" id="bestShowInfo{{$key}}" style="display: none; margin-top: 10px;">
					<div id="bestSlideContainer" class="slideContainer" style="margin-top: 10px;">
						<div class="col-xs-12">
							<strong class="slideTitle orangeAndBoldText" style="font-size: 16px;" id="bestSlideTitle{{$key}}"></strong>
							<div class="slideBody" style="text-align: left;">
								<ul>
									<li>
										<div class="messageblock">
											<div class="message">Duración: 
												<strong id="bestDuration{{$key}}"></strong>
											</div>
										</div>
									</li>
									<li>
										<div class="message">Idioma: 
											<strong id="bestLanguage{{$key}}"></strong>
										</div>
									</li>
									<li>
										<div class="message">Categorias: 
											<strong id="bestCategories{{$key}}"></strong>
										</div>
									</li>
									<li>
										<div class="message">Año de Producción: 
											<strong id="bestYear{{$key}}"></strong>
										</div>
									</li>
									<li>
										<div class="messageinfo" id="bestDescription{{$key}}">
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-xs-12">
							<a class="orangeAndBoldText" style="font-size: 16px; margin-bottom: 10px;" id="bestWatchNow{{$key}}">
								<div id="bestNotificationFooter">Ver Ahora</div>
							</a>
						</div>
					</div>
				</ul>
			@endif
		@endforeach
    </div>
@endsection

@section('page-style-files')
<link href='css/immersive-slider.css' rel='stylesheet' type='text/css'>
@stop

@section('page-js-files')
<script type="text/javascript" src="js/jquery.immersive-slider.js"></script>
@stop

@section('page-js-script')

<script>
	function openInfo(type, key, id, name, duration, language, category, category2, production_year, description) {
		var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    	var height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;

    	var generosName = [];
    	var generosIds = [];
    	var tiposName = [];
    	var tiposIds = [];
    	@foreach($genres as $key=>$genre)
    		//alert("{!!$genre->name!!}");
    		generosIds[{{$key}}] = "{!!$genre->id!!}";
            generosName[{{$key}}] = "{!!$genre->name!!}";
        @endforeach

          @foreach($types as $key=>$videoType)
          	//alert("{!!$videoType->name!!}");
          	tiposIds[{{$key}}] = "{!!$videoType->id!!}";
            tiposName[{{$key}}] = "{!!$videoType->name!!}";
        @endforeach

        //alert("largo tipo id: "+tiposIds.length);

        //alert("Generos "+ generos);

    	if(width >= 992){
			//Resolución MD
			if(key <= 3){
				var slideToUse = 3;
			}else{
				var slideToUse = 7;
			}
			var changeSlide = 0;
			while(changeSlide <= 3 && slideToUse >= key){
				var actual = document.getElementById(type+"ShowInfo"+slideToUse);
				if(actual == null){
					slideToUse--;
					changeSlide++;
				}else{
					actual = document.getElementById(type+"ShowInfo"+slideToUse);
					if (actual.style.display === 'none') {
						var slideTitleText = document.getElementById(type+"SlideTitle"+slideToUse);
						var durationText = document.getElementById(type+"Duration"+slideToUse);
						var languajeText = document.getElementById(type+"Language"+slideToUse);
						var categoriesText = document.getElementById(type+"Categories"+slideToUse);
						var yearText = document.getElementById(type+"Year"+slideToUse);
						var descriptionText = document.getElementById(type+"Description"+slideToUse);
						slideTitleText.innerHTML = name;
						durationText.innerHTML = duration;
						languajeText.innerHTML = language;

						var tipo = category;
						var genero = category2;
						for(var i = 0; i < tiposIds.length; i++){
							if(category == tiposIds[i]){
								tipo = tiposName[i];
							}
						}
						for(var j = 0; j < generosIds.length; j++){
							if(category2 == generosIds[j]){
								genero = generosName[j];
							}
						}

						categoriesText.innerHTML = tipo + ", " + genero;
						yearText.innerHTML = production_year;
						descriptionText.innerHTML = description;

						document.getElementById(type+"WatchNow"+slideToUse).href="/upload/"+id;
						closePopups();
						actual.style.display = 'block';

					}else{
						closePopups();
					}
					changeSlide = 4;
				}
			}
		}else if (width < 992 && width >= 768){
			//Resolución SM
			if(key <= 2){
				var slideToUse = 2;
			}else{
				var slideToUse = 5;
			}
			var changeSlide = 0;
			while(changeSlide <= 2 && slideToUse >= key){
				var actual = document.getElementById(type+"ShowInfo"+slideToUse);
				if(actual == null){
					slideToUse--;
					changeSlide++;
				}else{
					actual = document.getElementById(type+"ShowInfo"+slideToUse);
					if (actual.style.display === 'none') {
						var slideTitleText = document.getElementById(type+"SlideTitle"+slideToUse);
						var durationText = document.getElementById(type+"Duration"+slideToUse);
						var languajeText = document.getElementById(type+"Language"+slideToUse);
						var categoriesText = document.getElementById(type+"Categories"+slideToUse);
						var yearText = document.getElementById(type+"Year"+slideToUse);
						var descriptionText = document.getElementById(type+"Description"+slideToUse);
						slideTitleText.innerHTML = name;
						durationText.innerHTML = duration;
						languajeText.innerHTML = language;
						
						var tipo = category;
						var genero = category2;
						for(var i = 0; i < tiposIds.length; i++){
							if(category == tiposIds[i]){
								tipo = tiposName[i];
							}
						}
						for(var j = 0; j < generosIds.length; j++){
							if(category2 == generosIds[j]){
								genero = generosName[j];
							}
						}
						categoriesText.innerHTML = tipo + ", " + genero;
						yearText.innerHTML = production_year;
						descriptionText.innerHTML = description;

						document.getElementById(type+"WatchNow"+slideToUse).href="/upload/"+id;
						closePopups();
						actual.style.display = 'block';

					}else{
						closePopups();
					}
					changeSlide = 3;
				}
			}
		}else if (width < 768){
			//Resolución XS
			var actual = document.getElementById(type+"ShowInfo"+key);
			if (actual.style.display === 'none') {
				var slideTitleText = document.getElementById(type+"SlideTitle"+key);
				var durationText = document.getElementById(type+"Duration"+key);
				var languajeText = document.getElementById(type+"Language"+key);
				var categoriesText = document.getElementById(type+"Categories"+key);
				var yearText = document.getElementById(type+"Year"+key);
				var descriptionText = document.getElementById(type+"Description"+key);
				slideTitleText.innerHTML = name;
				durationText.innerHTML = duration;
				languajeText.innerHTML = language;
				var tipo = category;
				var genero = category2;
				for(var i = 0; i < tiposIds.length; i++){
					if(category == tiposIds[i]){
						tipo = tiposName[i];
					}
				}
				for(var j = 0; j < generosIds.length; j++){
					if(category2 == generosIds[j]){
						genero = generosName[j];
					}
				}
				categoriesText.innerHTML = tipo + ", " + genero;
				
				yearText.innerHTML = production_year;
				descriptionText.innerHTML = description;

				document.getElementById(type+"WatchNow"+key).href="/upload/"+id;
				closePopups();
				actual.style.display = 'block';
			}else{
				closePopups();
			}
		}
	}
	function closePopups(){
		for(x = 0; x<=7; x++){
            var newShow = document.getElementById("newShowInfo"+x);
            if(newShow != null){
                if (newShow.style.display === 'block') {
                    newShow.style.display = 'none';
                }
            }
            var viewShow = document.getElementById("viewShowInfo"+x);
            if(viewShow != null){
                if (viewShow.style.display === 'block') {
                    viewShow.style.display = 'none';
                }
            }
            var bestShow = document.getElementById("bestShowInfo"+x);
            if(bestShow != null){
                if (bestShow.style.display === 'block') {
                    bestShow.style.display = 'none';
                }
            }
        }
	}
</script>
<script type="text/javascript">
	var j = jQuery.noConflict();
    j(document).ready( function() {
        j("#immersive_slider").immersive_slider({
          container: null,
          loop: false, // Toggle to false if you don't want the slider to loop. Default is true.
          /*autoStart: 10000*/ // Define the number of milliseconds before it navigates automatically. Change this to 0 or false to disable autoStart. The default value is 5000.
        });
      });
    </script>
@stop