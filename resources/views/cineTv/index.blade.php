
@extends('layouts.cinetv')
@section('content')

{{$valid}}


@if ($valid == 1)



<script src="{!!url('/js/jquery.min.js')!!}"></script>
{{-- @foreach($movies as $movie)
<p>{{$movie->url}} {{$movie->play_at}}</p>
@endforeach --}}

<button id="myButton">i am button</button>
{{-- <video id="video" style="display:none; width:100%; height:100%;" preload="metadata"> --}}
<video id="video" style="display:none; width:100%;" autoplay controls>
 <source src="/files/convert/videos/{{$moviesNow->url}}" type="video/mp4" />
  Su navegador no soporta el tag video.
</video>
<h5 id="notNow" style="display:none; margin-top: 30px;">El siguiente video esta programado para: {{$moviesNow->startdate}} </h5>

<h5 id="noMoreVideos" style="display:none; margin-top: 30px;">No se encuentran videos programados</h5>
        {{-- <button onclick="getCurTime()" type="button">Get current time position</button>
        <button onclick="setCurTime()" type="button">Set time position to 5 seconds</button><br> --}}
        <div class="col-xs-12">
          <p style="display:none">A continuacion</p>
          <p id="next"></p>
          <div id="time"></div>
        </div>


        <script>
          console.log("url: "+url); 
          console.log("difTime: "+difTime);

          var vid = document.getElementById("video");
          var time = {{$difTime}};
          var isPlaying = {{$playNow}};
          var moviesArr = [];
          var hoursArr = [];

          var j = jQuery.noConflict();
          var video;
          (function (document) {
            j(function () {
              init();
            });

            function init() {
              video = document.getElementById('video');
              video.addEventListener('loadedmetadata', function () {
                setClick();
              });
            }
            function setClick() {
              j('#myButton').on('click', function () {
                video.currentTime = difTime;
              });
            }

          })(document);
          //alert("empieza en: "+time);
          //alert("cantidad:{{$programationsCount}} hora:{{$rightNow}} tiempo: {{$difTime}} isplay: {{$playNow}}")
          j(document).ready(function() {
            /*j("#video").on(
              "timeupdate", 
              function(event){
                alert("cambio de hora");
                vid.currentTime = difTime;
              });*/
            //alert(time);
            /*Si el video se esta reproduciendo, se adelanta al minuto correspondiente, si aun no empieza se envia aviso, en ambos casos se envian los videos posteriores a un arreglo js
            */
            if(difTime >= 0 && isPlaying == 1){
              console.log("en if");
              //var vid = document.getElementById("video");
              //var source = document.createElement('source');

              //var isChrome = !!window.chrome; 
              //var isIE = /*@cc_on!@*/false;
              //if( isChrome ) {
              // alert("is chrome");
              //}
              //if( isIE ) {
              // alert("is isIE");
              //}
              
              //document.getElementById("video").style.display="inline";


              @foreach($movies as $key=>$movie)
              @if ($key >= 1)
              var movieArr = "{{$movie->url}}";
              var hourArr = "{{$movie->start_at}}";
              moviesArr[{{$key}} - 1] = movieArr;
              hoursArr[{{$key}} - 1] = hourArr;
              @endif
              @endforeach
              alert("Bienvenido al sistema de programación de la Escuela de Cine, en este momento se esta reproduciendo: {{$moviesNow->title}}");
              vid.currentTime = difTime;
              vid.style.display="inline";

                //document.getElementById("next").innerHTML = moviesArr;
                //startTime();

                /*startTime();
                var dataTemp = [{ field1: name, field2: duration}];
                dt.load(dataTemp, true);*/
              }else if (isPlaying == 0){

                document.getElementById("notNow").style.display="inline";
                @foreach($movies as $key=>$movie)
                var movieArr = "{{$movie->url}}";
                var hourArr = "{{$movie->start_at}}";
                moviesArr[{{$key}}] = movieArr;
                hoursArr[{{$key}} - 1] = hourArr;
                @endforeach
                alert("Bienvenido al sistema de programación de la Escuela de Cine, la emisión de {{$moviesNow->title}}  comienza a las {{$moviesNow->start_at}}"+moviesArr);
                document.getElementById("next").innerHTML = moviesArr;

                startTime();
              }
            });

          var count = moviesArr.length;
          var actual = 0;

          vid.onended = function() {
            alert("termino");
            startTime();
          };

          function loadVideo(){
            if(moviesArr.length != 0){
              vid.src = moviesArr[0];
              document.getElementById("video").style.display="inline";
              moviesArr.splice(0, 1); //Borra 1 elemento en la posicion cero.
              hoursArr.splice(0, 1);
            }else{
              document.getElementById("noMoreVideos").style.display="inline";  
            }
          }
              function checkTime(i) {
                if (i < 10) {
                  i = "0" + i;
                }
                return i;
              }
              function startTime() {
                alert("new dasdaday");
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                // add a zero in front of numbers<10
                m = checkTime(m);
                s = checkTime(s);
                var now = h + ":" + m + ":" + s;
                document.getElementById('time').innerHTML = now;
                var nextProgramStart = 0;
                if(hoursArr.length != 0){
                  nextProgramStart = hoursArr[0];
                }
                var newDay = "0:00:00";
                
                if(now == nextProgramStart && nextProgramStart != 0){
                  loadVideo();
                  //location.reload();
                  //alert("nueve veinticinco");
                }else if (now == newDay){
                  location.reload();
                }
                t = setTimeout(function () {
                  startTime()
                }, 1000);
                
              

              /*if(actual < count){
                vid.src = moviesArr[actual];
                logger('video cargado correctamente '+ vid.src);
                if(actual < count-1){
                  logger('Siguiente: '+ moviesArr[(actual+1)]);
                }
                actual ++;
              }else{
                location.reload();
              }*/
            }
            /*function playVid() {
              vid.play();
            }

            function pauseVid() {
              vid.pause();
            }
            vid.currentTime = time;
            function getCurTime() {
              alert(time);
              alert(vid.currentTime);
            } 
            function changehour() {
              var vid = document.getElementById("video");
              console.log(vid.currentTime);
              vid.currentTime = 1000;
              vid.load();
              vid.play();
            } */
            //function setCurTime() {
              /*var vid = document.getElementById("video");
              var source = document.createElement('source');
              source.setAttribute('src', '/files/convert/videos/'+url);
              vid.appendChild(source);
              
              vid.play();
              vid.currentTime = difTime;
              console.log("asignado en ", difTime);*/
            //};
            
          </script> 


          {{--  <video src="" id="video" style="width:680px;height:320px" autoplay="true" controls></video> --}}
          <canvas id="preview" style="display: none"></canvas>

          <div id="logger"></div> 

          @else
          <h5 style="margin-top: 30px;">No se encuentran videos programados</h5>

          <div id="time2"></div>
          <script type="text/javascript">
            startTime();

            function checkTime(i) {
              if (i < 10) {
                i = "0" + i;
              }
              return i;
            }

            function startTime() {
              //alert("new dasdaday");
              var today = new Date();
              var h = today.getHours();
              var m = today.getMinutes();
              var s = today.getSeconds();
              // add a zero in front of numbers<10
              m = checkTime(m);
              s = checkTime(s);
              var now = h + ":" + m + ":" + s;
              document.getElementById('time2').innerHTML = now;
              var newDay = "0:00:00";
              if (now == newDay){
                location.reload();
              }
              t = setTimeout(function () {
                startTime()
              }, 1000);
              
            }
          </script>
          @endif
          @endsection