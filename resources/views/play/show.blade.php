@extends('layouts.mainApp')
@section('content')

@if (Auth::guest())
	no login
@else

	<div class="col-sm-12" id="mainBody" style="overflow: hidden; 
		background-color: #f8f8f8;
	    border-color: #e7e7e7;">
		<div class="col-sm-12 col-md-8" style="margin-top: 10px">


		    <video class="col-md-12" controls id="player" class="embed-responsive-item" style="width: 100%">{{-- 
		           <source src="/files/convert/trailers/{{$trailer->url}}" type="video/mp4"> --}}
		            <source src="/files/convert/videos/{{$movie->url}}" type="video/mp4">
		            {{-- <track src="/files/subs/Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa" kind="subtitles" srclang="es" label="Spanish"> --}}
		       
		    </video>
		    <div class="col-xs-12">
	    		<h3 class="orangeAndBoldText">{{$movie->name}}</h3>
			</div>
		</div>

		<div class="col-sm-10 col-md-4">
		    @if (!Auth::guest())
		        <div id="dv1">
		        </div>
		        <br><br><br>
		             
		        <div class="row">
		          	<label class="orangeText">{{$movie->description}}</label> 
			        <br><br><br>  
			        <h5 class="orangeAndBoldText">Evalua este video</h5>
			          <!-- Rating start -->
			        
			        <fieldset id='demo2' class="rating">
			        	<input class="stars" type="radio" id="star5" name="rating" value="5" />
			        	<label class = "full" for="star5" title="Excelente - 5 estrellas"></label>
			        	<input class="stars" type="radio" id="star4half" name="rating" value="4.5" />
			        	<label class="half" for="star4half" title="Muy bueno - 4.5 estrellas"></label>
			        	<input class="stars" type="radio" id="star4" name="rating" value="4" />
			        	<label class = "full" for="star4" title="Muy bueno - 4 estrellas"></label>
			        	<input class="stars" type="radio" id="star3half" name="rating" value="3.5" />
			        	<label class="half" for="star3half" title="Medio - 3.5 estrellas"></label>
			        	<input class="stars" type="radio" id="star3" name="rating" value="3" />
			        	<label class = "full" for="star3" title="Medio - 3 estrellas"></label>
			        	<input class="stars" type="radio" id="star2half" name="rating" value="2.5" />
			        	<label class="half" for="star2half" title="Relativamente malo - 2.5 estrellas"></label>
			        	<input class="stars" type="radio" id="star2" name="rating" value="2" />
			        	<label class = "full" for="star2" title="Relativamente malo - 2 estrellas"></label>
			        	<input class="stars" type="radio" id="star1half" name="rating" value="1.5" />
			        	<label class="half" for="star1half" title="Malo - 1.5 estrellas"></label>
			        	<input class="stars" type="radio" id="star1" name="rating" value="1" />
			        	<label class = "full" for="star1" title="Malo - 1 estrella"></label>
			        	<input class="stars" type="radio" id="starhalf" name="rating" value="0.5" />
			        	<label class="half" for="starhalf" title="Muy malo - 0.5 estrellas"></label>
			        </fieldset>
		          <!-- Demo 2 end -->
		          <br><br><br>
		          <div id='feedback'></div>
		                  <!-- Demo 3 end -->
		          <div style='clear:both;'></div>
		        </div>
		      @else

		        <div id="dv1">
		        </div>
		        <br><br><br>
		        <div class="row">
		          	<label>{{$movie->description}}</label>
		          	<br><br><br>
		          	<label>Para visualizar este video completo debe estar registrado.</label>   
		        </div>
		      @endif
	    </div>
	</div>	
	<div class="col-sm-12" style="overflow: hidden; 
		background-color: #f8f8f8;
	    border-color: #e7e7e7;
	    margin-top: 20px">
	    <div class="col-md-12" style="max-width: 100%">
    <H4 class="orangeText">Videos recomendados</H4>
    <div class="flexslider">
      <ul class="slides">
        
        @foreach($newMovies as $movie2)
          <li>
            <a href="{{ action("MovieController@show", array($movie2->id)) }}">
              <img src="../files/{{$movie2->imageRef}}" />
              <h3 href="{{ action("MovieController@show", array($movie2->id)) }}" style="color: #F0643C;
                display: block;
                font-size: 0.875em;
                line-height: 1.5em;
                padding: 10px 0;
                text-transform: uppercase;
                text-align:center;
                margin-top: 0px">{{$movie2->name}}</h3>
            </a>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
		
	</div>

@endif
@stop


@section('page-style-files')

<link href="/css/rating.css" media="all" rel="stylesheet" type="text/css"/>
<link href="/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<link href="/css/flexslider.css" rel="stylesheet"/>
@stop

@section('page-js-files')
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script defer src="/js/jquery.flexslider.js"></script>
@stop

@section('page-js-script')
	<script>
		var j = jQuery.noConflict();
		j(document).ready(function () {
			j("#demo2 .stars").click(function () {
				j.post('../rating.php',{
					rate:j(this).val(),
					user:{!! Auth::user()->id !!},
					movie:{{$movie->id}}
				},function(d){
					if(d>0){
			            //alert('You already rated'+d);
			        }else{
			            //alert('Thanks For Rating');
			        }
			    });
				j(this).attr("checked");
			});
		});
	</script>
	<script>
		var j = jQuery.noConflict();
		j("#player").bind("ended", function() {
	        //alert('Video ended!');
	        j.post('../visit.php',{
					visits:1,
					movie:{{$movie->id}}
				},function(d){
					if(d>0){
			            alert('Respuesta:'+d);
			        }else{
			            //alert('Thanks For Rating');
			        }
			    });
				j(this).attr("checked");
	    });
	</script>
    <script type="text/javascript"> 
        jQuery.noConflict();
        jQuery(function() {
            jQuery('.flexslider').flexslider({
            	animation: "slide",
            	animationLoop: false,
            	itemWidth: 120,
            	itemMargin: 5,
             	minItems: 2,
              	maxItems: 4,
            });
        });
    </script>
@stop