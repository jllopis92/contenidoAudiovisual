@extends('layouts.mainApp')

@section('content')
@if ($valid == 1)
  

<script src="{!!url('/js/jquery.min.js')!!}"></script>
{{-- @foreach($movies as $movie)
<p>{{$movie->url}} {{$movie->play_at}}</p>
@endforeach --}}
<h3 class="orangeAndBoldText">Cine TV</h3>
      <p>Diferencia de tiempo: {{$difTime}}</p>
       <video id="video" style="display:none; width:680px; height:320px;" autoplay controls>
          <source src="/files/convert/videos/{{$moviesNow->url}}" type="video/mp4" />
          Su navegador no soporta el tag video.
        </video>
        <div id="notNow" style="display:none">El siguiente video esta programado para: {{$moviesNow->play_at}}</div>
        {{-- <button onclick="getCurTime()" type="button">Get current time position</button>
        <button onclick="setCurTime()" type="button">Set time position to 5 seconds</button><br> --}}
        <p>A continuacion</p>
        <p id="next"></p>

        <div id="time"></div>

        <script>
          var vid = document.getElementById("video");
          var time = {{$difTime}};
          var isPlaying = {{$playNow}};
          var moviesArr = [];
          var j = jQuery.noConflict();
          //alert("cantidad:{{$programationsCount}} hora:{{$rightNow}} tiempo: {{$difTime}} isplay: {{$playNow}}")
          j(document).ready(function() {
            //alert(time);
            /*Si el video se esta reproduciendo, se adelanta al minuto correspondiente, si aun no empieza se envia aviso, en ambos casos se envian los videos posteriores a un arreglo js
            */
            if(time >= 0 && isPlaying == 1){
                //alert("Bienvenido a Programación Cine UV, en este momento se esta reproduciendo: {{$moviesNow->url}}");
                vid.currentTime = time;
                @foreach($movies as $key=>$movie)
                  @if ($key >= 1)
                    var movieArr = "{{$movie->url}}";
                    moviesArr[{{$key}} - 1] = movieArr;
                  @endif
                @endforeach
                vid.style.display="inline";
                document.getElementById("next").innerHTML = moviesArr;

                /*startTime();
                var dataTemp = [{ field1: name, field2: duration}];
                dt.load(dataTemp, true);*/
              }else if (isPlaying == 0){
                alert("Bienvenido a Programación Cine UV, la emision de {{$moviesNow->url}}  comienza a las {{$moviesNow->play_at}}");
                pauseVid();
                document.getElementById("notNow").style.display="inline";
                @foreach($movies as $key=>$movie)
                  var movieArr = "{{$movie->url}}";
                  moviesArr[{{$key}} - 1] = movieArr;
                @endforeach
                document.getElementById("next").innerHTML = moviesArr;

                startTime();
                /*var dataTemp = [{ field1: name, field2: duration}];
                dt.load(dataTemp, true);*/
              }
            });
            var count = moviesArr.length;
            var actual = 0;

            vid.onended = function() {
              loadVideo();
            };
            function loadVideo(){
              if(actual < count){
                vid.src = moviesArr[actual];
                logger('video cargado correctamente '+ vid.src);
                if(actual < count-1){
                  logger('Siguiente: '+ moviesArr[(actual+1)]);
                }
                actual ++;
              }else{
                location.reload();
              }
            }
            function playVid() {
              vid.play();
            }

            function pauseVid() {
              vid.pause();
            }
            //vid.currentTime = time;
            function getCurTime() {
              alert(time);
              //alert(vid.currentTime);
            } 
            function setCurTime() { 
              vid.currentTime = time;
            }
            function checkTime(i) {
              if (i < 10) {
                i = "0" + i;
                }
                return i;
              }
            function startTime() {
              var today = new Date();
              var h = today.getHours();
              var m = today.getMinutes();
              var s = today.getSeconds();
              // add a zero in front of numbers<10
              m = checkTime(m);
              s = checkTime(s);
              var now = h + ":" + m + ":" + s;
              var nextProgramStart = "11:55:00";
              document.getElementById('time').innerHTML = now;
              if(now == nextProgramStart){
                location.reload();
                //alert("nueve veinticinco");
              }
              t = setTimeout(function () {
                startTime()
              }, 1000);
              
            }
         </script> 


 {{--  <video src="" id="video" style="width:680px;height:320px" autoplay="true" controls></video> --}}
  <canvas id="preview" style="display: none"></canvas>

  <div id="logger"></div> 





  {{-- <script type="text/javascript">
    var canvas = document.getElementById("preview");
    var context = canvas.getContext("2d");

    canvas.width = 800;
    canvas.height = 600;

    context.width = canvas.width;
    context.height = canvas.height;

    var video = document.getElementById("video");
    var socket = io();

    var videos = ["test.mp4","011portrait.mp4","1645Video.mp4"];
    //var videos = ["test.mp4","011portrait.mp4","1645Video.mp4","Warcraft.mp4"];
    var count = videos.length;
    var actual = 0;


      //var next= document.getElementById("next");

    //funcion cuando el video termina
    video.onended = function() {
      loadCam();
        //alert("Actual: "+ actual);
    };

    function logger(msg){
      $("#logger").text(msg);
    }
    //carga video o camara
    function loadCam(){
      if(actual < count){
        video.src = videos[actual];
        //next.value = videos[(actual+1)];
        //video.src = "test.mp4";
        //video.src = stream;
        //video.src = window.URL.createObjectURL(stream);
        logger('video cargado correctamente '+ video.src);
        logger('Siguiente: '+ videos[(actual+1)]);
        actual ++;
      }
      
    }
    //error al cargar
    function loadFail(){
      logger('error en video');
    }
    function viewVideo(video, context){
      context.drawImage(video,0,0,context.width,context.height);
      //logger('/n video'+ video);
      //logger('/n contexto'+ context);
      socket.emit('stream',canvas.toDataURL('image/webp'));
    }
    //solicita permisos de camara para todos los navegadores
    $(function(){
      navigator.getUserMedia = (navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msgGetUserMedia);

      if(navigator.getUserMedia){
        //que usaremos, correcto, fallo
        loadCam();
        setInterval(function(){
          viewVideo(video,context);
        },400);//1000 = 1 segundo
        //navigator.getUserMedia({video : true, audio : true},loadCam, loadFail);
      }
      
    });
  </script> --}}
@else
  <h5 style="margin-top: 30px;">No se encuentran videos programados</h5>
@endif
@endsection