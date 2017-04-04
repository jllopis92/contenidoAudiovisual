@extends('layouts.mainApp')
@section('content')

	<div class="col-sm-12" id="mainBody" style="overflow: hidden; 
		background-color: #f8f8f8;
	    border-color: #e7e7e7;
	    padding-top: 10px;">

	    <div class="col-xs-12" style="padding-left: 0px;">
	    	<h3 class="orangeAndBoldText">{{$movie->name}}</h3>
		</div>
		<div class="col-xs-12" style="margin-top: 10px padding-right: 0px;padding-left: 0px;">
			@if (Auth::guest())
		    	@foreach($trailers as $trailer)
				    <video class="col-xs-12 col-md-8" controls id="player" class="embed-responsive-item" style="width: 100%; padding-left: 0px;">
						<source src="/files/convert/trailers/{{$trailer->url}}" type="video/mp4">
				            {{-- <track src="/files/subs/Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa" kind="subtitles" srclang="es" label="Spanish"> --}}
				    </video>
				@endforeach
		    @else
		    	<div class="col-xs-12 col-md-8" style=" padding-left: 0px;">
		    		<video class="col-md-12" controls id="player" class="embed-responsive-item" style="width: 100%; padding-left: 0px;">
			            <source src="/files/convert/videos/{{$movie->url}}" type="video/mp4">

			            @foreach($subtitles as $subtitle)
			            	<track src="/files/{{$subtitle->url}}" kind="subtitle" srclang="en-US" label="{{$subtitle->language}}" />
				            {{-- <track label="{{$subtitle->language}}" kind="subtitles" srclang="es" src="/files/{{$subtitle->url}}" default> --}}
					   @endforeach
			            {{-- <track src="/files/subs/Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa" kind="subtitles" srclang="es" label="Spanish"> --}}
			    	</video>
		    	</div>
		    	
		    	<div class="col-xs-12 col-md-4" style="padding-left: 0px; padding-right: 0px; padding-left: 0px;">
		    		<div class="col-xs-12 pre-scrollable">
		    			@foreach($commentaries as $commentary)
		    				@if($commentary->movie_id == $movie->id)
				    			<div class="col-xs-12" id="commentary" style="padding: 0px">
								    <div class="col-xs-12" id="header">
								    	<div class="col-xs-10">
								    		@foreach($users as $user)
								    			@if($user->id == $commentary->user_id)
											    	<div class="col-xs-12" style="padding: 0px">
											    		<h5>{{$user->name}}</h5>
											    	</div>
											    @endif
									    	@endforeach
									    	<div class="col-xs-12" style="padding: 0px">
									    		<p style="font-size: 12px;">{{$commentary->created_at}}</p>
									    	</div>
								    	</div>
								    	<div class="col-xs-2" style="padding: 0px; margin-top: 5px;">
								    		@if (Auth::user()->tipo == "administrador")
								    			{{ Form::open(array('route' => array('commentary.destroy', $commentary->id), 'method' => 'delete')) }}
										    		{!! Form::submit('X',['class' =>'btn btn-danger btn-xs pull-right']) !!}
										    	{!! Form::close() !!}
								    		@endif
								    	</div>
								    	<div class="col-xs-12" id="body">
								    		<label>{{$commentary->text}}</label>
								    	</div>
								    </div>
							    </div>
						    @endif
					    @endforeach
		    		</div>
		    		<div class="col-md-12" style="margin-top: 10px">
		    			{!! Form::open(['id' => 'newComment', 'route' =>'commentary.store', 'method'=>'POST']) !!}
		    				<div class="form-group col-xs-12" style="display: none">
						        {!! Form::label('movie_id', 'Video: ') !!}
			                	{!! Form::text('movie_id', $movie->id) !!}
		                	</div>
		                	<div class="form-group col-xs-12" style="display: none">
						        {!! Form::label('user_id', 'Usuario: ') !!}
			                	{!! Form::text('user_id', Auth::user()->id) !!}
		                	</div>
		                	<div class="form-group col-xs-12">
			    				{!! Form::label('text', 'Comentario') !!}
		                		{!! Form::textarea('text', null, ['rows'=>'4', 'class'=> 'form-control']) !!}
		                		<div class="alert alert-danger col-xs-12" id="textValidation" style="display: none">
                            </div>
	                		</div>
			    			{{-- <p style="margin-top: 15px; margin-bottom: 5px; ">Comentario</p>
			    			<div class="col-md-9">
			    				<textarea rows="4"></textarea>
			    			</div> --}}
			    			<div class="col-xs-12">
			    				{!! Form::submit('Enviar',['class' =>'btn btn-success btn-xs pull-right disabled sendButton']) !!}
			    				{{-- <button type="button" class="btn btn-success btn-xs pull-right" style="margin-top: 20px;">Enviar</button> --}}
			    			</div>
		    			{!! Form::close() !!}
		    		</div>
		    	</div>
		    @endif
		   
			<div class="col-xs-12" style="padding-left: 0px;">
				@if (!Auth::guest())
			        <div id="dv1">
			        </div>
			        <br><br><br>
			             
			        <div class="row" style="margin-left: 0px; margin-right: 0px;">
			          	<label class="blackText">{{$movie->description}}</label> 
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
			        <div class="row" style="margin-left: 0px; margin-right: 0px;">
			          	<label class="blackText">{{$movie->description}}</label>
			          	<br><br><br>
			          	<label class="blackText">Para visualizar este video completo debe estar registrado.</label>   
			        </div>
		      	@endif
			</div>
		</div>
	</div>	
	<div class="col-sm-12" style="overflow: hidden; 
		background-color: #f8f8f8;
	    border-color: #e7e7e7;
	    margin-top: 20px;
	    padding-left: 15px;">
	    <div class="col-md-12" style="max-width: 100%; padding-left: 0px;">
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

@stop


@section('page-style-files')

<link href="/css/rating.css" media="all" rel="stylesheet" type="text/css"/>
<link href="/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<link href="/css/flexslider.css" rel="stylesheet"/>
@stop

@section('page-js-files')
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script defer src="/js/jquery.flexslider.js"></script>
{{-- <script src="/js/videosub-0.9.9.js"></script> --}}
@stop

@section('page-js-script')
	<script>
		@if(!Auth::guest())
			var j = jQuery.noConflict();
			j(document).ready(function () {
				j("#demo2 .stars").click(function () {
					//alert('Ranking');
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
		@endif
	</script>
	<script>
		@if(!Auth::guest())
		var j = jQuery.noConflict();
		j("#player").bind("ended", function() {
	        //alert('Video ended!');
	        j.post('../visit.php',{
					visits:1,
					movie:{{$movie->id}},
					user:{!! Auth::user()->id !!}
				},function(d){
					if(d>0){
			            alert('Respuesta:'+d);
			        }else{
			            //alert('Thanks For Rating');
			        }
			    });
				j(this).attr("checked");
	    });
	    @endif
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
    <script type="text/javascript">
    	var validText = 0;
    	j('#text').on('input',function(e){
            checkText();
        });

        function checkText(){
            var text = j('#text').val();
            var BLIDRegExpression = /^[a-zA-Z0-9\ \Ñ\ñ\,\.\:\;\u00C0-\u017F\-\_\?\¿\!\(\)\[\]]+$/;
            if(text.length == 0){
                document.getElementById("textValidation").style.display = "inline";
                document.getElementById("textValidation").innerHTML = 'Campo Obligatorio';
                validText = 0;
            }else if (!BLIDRegExpression.test(text)) {
                document.getElementById("textValidation").style.display = "inline";
                document.getElementById("textValidation").innerHTML = 'El Campo Contiene Caracteres Invalidos';
                validText = 0;
            }else{
                document.getElementById("textValidation").style.display = "none";
                validText = 1;
            }
            checkForm();
        }

        function checkForm() {
            if(validText == 0){
                j(".sendButton").attr('class', 'btn btn-success btn-xs pull-right sendButton disabled');
            }
            if(validText == 1){
                j(".sendButton").attr('class', 'btn btn-success btn-xs pull-right sendButton active');
            }            
        }
    </script>
@stop