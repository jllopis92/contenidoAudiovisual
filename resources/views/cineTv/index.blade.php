
@extends('layouts.cinetv')
@section('content')

@if ($valid == 1)

  <script src="{!!url('/js/jquery.min.js')!!}"></script>

  <div class="col-xs-12" style="display: none;">
    <p style="display:none">A continuacion</p>
    <p id="next"></p>
    <div id="time"></div>
  </div>
  <div class="col-xs-12">
    <video id="video" style="display:none; width: 100%; height: 100%;" autoplay>
    <source src="/files/convert/videos/{{$moviesNow->url}}" type="video/mp4" />
    Su navegador no soporta el tag video.
    </video>
    <h5 id="notNow" style="display:none; margin-top: 30px;">El siguiente video esta programado para: {{$moviesNow->startdate}} </h5>

    <h5 id="noMoreVideos" style="display:none; margin-top: 30px;">No se encuentran videos programados</h5>
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
            
    j(document).ready(function() {

      if(difTime >= 0 && isPlaying == 1){
        console.log("en if");
                
        //var isChrome = !!window.chrome; 
        //var isIE = /*@cc_on!@*/false;
        //if( isChrome ) {
        // alert("is chrome");
        //}
        //if( isIE ) {
        // alert("is isIE");
        //}
   
        @foreach($movies as $key=>$movie)
          @if ($key >= 1)
            var movieArr = "{{$movie->url}}";
            var hourArr = "{{$movie->start_at}}";
            moviesArr[{{$key}} - 1] = movieArr;
            hoursArr[{{$key}} - 1] = hourArr;
          @endif
        @endforeach
        document.getElementById("video").style.display="inline";
        alert("Bienvenido al sistema de programación de la Escuela de Cine, en este momento se esta reproduciendo: {{$moviesNow->title}}");
        vid.currentTime = difTime;
        vid.style.display="inline";
      }else if (isPlaying == 0){
        document.getElementById("notNow").style.display="inline";
        @foreach($movies as $key=>$movie)
          var movieArr = "{{$movie->url}}";
          var hourArr = "{{$movie->start_at}}";
          moviesArr[{{$key}}] = movieArr;
          hoursArr[{{$key}}] = hourArr;
        @endforeach
          alert("Bienvenido al sistema de programación de la Escuela de Cine, la emisión de {{$moviesNow->title}}  comienza a las {{$moviesNow->start_at}}"+moviesArr);
          document.getElementById("next").innerHTML = moviesArr;
          startTime();
      }
    });

    vid.onended = function() {
      console.log("termino");
      startTime();
    };

    function loadVideo(){
      if(moviesArr.length != 0){
        console.log("cambia a ",moviesArr[0]);
        vid.src = "/files/convert/videos/"+moviesArr[0];
        vid.play();
        document.getElementById("video").style.display="inline";
        moviesArr.splice(0, 1); //Borra 1 elemento en la posicion cero.
        hoursArr.splice(0, 1);
        document.getElementById("next").innerHTML = moviesArr;
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
        var d = new Date(hoursArr[0]);
        var hours = d.getHours();
        var minutes = d.getMinutes();
        var seconds = d.getSeconds();
        if(minutes < 10){
          minutes = "0"+minutes;
        }
        if(seconds < 10){
          seconds = "0"+seconds;
        }
        nextProgramStart = hours + ":" + minutes + ":" + seconds;                 
      }
      var newDay = "0:00:00";
                  
      if(now == nextProgramStart && nextProgramStart != 0){
        loadVideo();
      }else if (now == newDay){
        location.reload();
      }
      t = setTimeout(function () {
        startTime()
      }, 1000);
    }
  </script> 

  <canvas id="preview" style="display: none"></canvas>

  <div id="logger"></div> 

@else


<style>
#dialogoverlay{
    display: none;
    opacity: .8;
    position: fixed;
    top: 0px;
    left: 0px;
    background: #FFF;
    width: 100%;
    z-index: 10;
}
#dialogbox{
    display: none;
    position: fixed;
    background: #000;
    border-radius:7px; 
    width:550px;
    z-index: 10;
}
#dialogbox > div{ background:#FFF; margin:8px; }
#dialogbox > div > #dialogboxhead{ font-size:19px; padding:10px; color:#F0643C; }
#dialogbox > div > #dialogboxbody{ padding:20px; color:#F0643C; }
#dialogbox > div > #dialogboxfoot{ padding:10px; text-align:right; }
#dialogbox > div > #imgAlert{ width: 100px; }
</style>
<script>
function CustomAlert(){
    this.render = function(dialog){
        var winW = window.innerWidth;
        var winH = window.innerHeight;
        var dialogoverlay = document.getElementById('dialogoverlay');
        var dialogbox = document.getElementById('dialogbox');
        dialogoverlay.style.display = "block";
        dialogoverlay.style.height = winH+"px";
        dialogbox.style.left = (winW/2) - (550 * .5)+"px";
        dialogbox.style.top = "100px";
        dialogbox.style.display = "block";
        document.getElementById('dialogboxhead').innerHTML = "<img id='imgAlert' src=\'images/home.png\'> Bienvenido al sistema de programación de la Escuela de Cine";
        document.getElementById('dialogboxbody').innerHTML = "En este momento no se encuentran videos programados";
        document.getElementById('dialogboxfoot').innerHTML = '<button onclick="Alert.ok()">OK</button>';
    }
    this.ok = function(){
        document.getElementById('dialogbox').style.display = "none";
        document.getElementById('dialogoverlay').style.display = "none";
    }
}
var Alert = new CustomAlert();
</script>

<div id="dialogoverlay"></div>
<div id="dialogbox">
  <div>
    <div id="dialogboxhead"></div>
    <div id="dialogboxbody"></div>
    <div id="dialogboxfoot"></div>
  </div>
</div>
<h1>My web document content ...</h1>
<h2>My web document content ...</h2>
<button onclick="alert('You look very pretty today.')">Default Alert</button>
<button onclick="Alert.render('You look very pretty today.')">Custom Alert</button>
<button onclick="Alert.render('And you also smell very nice.')">Custom Alert 2</button>
<h3>My web document content ...</h3>






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
      var today = new Date();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();// add a zero in front of numbers<10
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