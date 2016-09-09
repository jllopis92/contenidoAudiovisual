<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Live delay example</title>

    <script src="assets/vendor/dashjs/dist/dash.all.debug.js"></script>
    <!--dash.all.min.js should be used in production over dash.all.debug.js
        Debug files are not compressed or obfuscated making the file size much larger compared with dash.all.min.js-->
    <!--<script src="../../dist/dash.all.min.js"></script>-->

    <script>
        var player,firstLoad = true;
        function init()
        {
            setInterval( function() {
                if (player && player.isReady())
                {
                    var d = new Date();
                    var seconds = d.getSeconds();
                    document.querySelector("#sec").innerHTML = ( seconds < 10 ? "0" : "" ) + seconds;
                    var minutes = d.getMinutes();
                    document.querySelector("#min").innerHTML = ( minutes < 10 ? "0" : "" ) + minutes;
                    document.querySelector("#videoDelay").innerHTML = Math.round((d.getTime()/1000) - Number(player.timeAsUTC()));
                    document.querySelector("#videoBuffer").innerHTML = player.getBufferLength()+ "s";
                }
            },1000);
        }
        function load(button)
        {
            if (!firstLoad)
            {
                player.reset();
            }
            firstLoad = false;
            var url =  document.getElementById("manifest").value;
            player = dashjs.MediaPlayer().create();
            player.getDebug().setLogToBrowserConsole(false);
            switch (document.querySelector('input[name="delay"]:checked').value) {
                case "segments":
                    player.setLiveDelayFragmentCount(document.querySelector("#delayInFragments").value);
                    break;
                case "time":
                    player.setLiveDelay(document.querySelector("#delayInSeconds").value);
                    break;
            }
            player.initialize(document.querySelector("video"), url, true);
        }
        function delaySelect(obj)
        {
            switch (obj.value) {
                case "default":
                    document.querySelector("#fragmentsEntry").style.display = "none";
                    document.querySelector("#secondsEntry").style.display = "none";
                    break;
                case "segments":
                    document.querySelector("#fragmentsEntry").style.display = "inline";
                    document.querySelector("#secondsEntry").style.display = "none";
                    break;
                case "time":
                    document.querySelector("#fragmentsEntry").style.display = "none";
                    document.querySelector("#secondsEntry").style.display = "inline";
                    break;
            }
        }
    </script>

    <style>
        video {
            width: 640px;
            height: 360px;
        }
        #manifest {
            width:300px;
        }
        #loadButton {
            background-color: orange;
        }
        .clock {
            color:#000; font-size: 40pt
        }
        #fragmentsEntry,#secondsEntry {
            position:relative;
            display: none;
            width:50px;
        }
        #delayInFragments,#delayInSeconds {
            width:50px;
        }
    </style>

<body onload="init()">

This sample allows you to explore the two MediaPlayer APIS which control live delay - setLiveDelay and setLiveDelayFragmentCount.<br/>
The first takes the desired delay in seconds. The second takes the delay in terms of fragment count.
If you use both together, setLiveDelay <br/> will take priority. If you set neither, the default delay of 4 segment durations will be used.
Note that using either method will not result in the <br/> offset exactly matching the requested setings. The final achieved delay is a function of the segment duration, when the
stream is requested <br/>with respect to the segment boundaries, as well as the amount of data the source buffers need to begin decoding.
<p/>
Enter the URL to a live (dynamic) stream manifest :
<input id="manifest" type="text" value="http://vm2.dashif.org/livesim/testpic_2s/Manifest.mpd"/><br/>
<form>
    Set the live delay at stream start-up using one of the three possible methods:<br/>
    <input type="radio" onclick="delaySelect(this)" name="delay" value="default" checked> Default<br/>
    <input type="radio" onclick="delaySelect(this)" name="delay" value="segments"> Fragment Count<br/>
    <div id="fragmentsEntry">
        Enter the desired value for setLiveDelayFragmentCount in number of fragments <input id="delayInFragments" type="text"/> <br/>
    </div>
    <input type="radio" onclick="delaySelect(this)" name="delay" value="time"> Time in seconds<br/>
    <div id="secondsEntry">
        Enter the desired value for setLiveDelay in seconds <input id="delayInSeconds" type="text"/><br/>
    </div>
    <p/>
    <input id="loadButton" type="button" value="LOAD PLAYER" onclick="load(this)"/>
    <p/>
</form>

<div>
    <video controls="true">
    </video>
    <p/>
    Playhead seconds behind live: <span id="videoDelay"></span><br/>
    Buffer length: <span id="videoBuffer"></span>
    <div>Wall clock time
        <div class="clock">
            <span id="min"> </span>:<span id="sec"></span>
        </div>
    </div>
</div>
</body>
</html>