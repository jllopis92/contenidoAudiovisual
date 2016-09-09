<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<!-- Website Design By: www.happyworm.com -->
<title>Demo : jPlayer as a video playlist player</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="assets/vendor/jPlayer-2.9.2/dist/skin/blue.monday/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="assets/vendor/jPlayer-2.9.2/lib/jquery.min.js"></script>
<script type="text/javascript" src="assets/vendor/jPlayer-2.9.2/dist/jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="assets/vendor/jPlayer-2.9.2/dist/add-on/jplayer.playlist.min.js"></script>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){

  new jPlayerPlaylist({
    jPlayer: "#jquery_jplayer_1",
    cssSelectorAncestor: "#jp_container_1"
  }, [
    {
      title:"Big Buck Bunny Trailer",
      free:true,
      m4v: "/files/convert/videos/275945VideoTest.mp4",
      poster:"http://www.jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png"
    },
    {
      title:"Finding Nemo Teaser",
      m4v: "/files/convert/videos/1645Video.mp4",
      poster: "http://www.jplayer.org/video/poster/Finding_Nemo_Teaser_640x352.png"
    },
    {
      title:"Incredibles Teaser",
      m4v: "/files/convert/videos/48Test.mp4",
      poster: "http://www.jplayer.org/video/poster/Incredibles_Teaser_640x272.png"
    }
  ], {
    swfPath: "../../dist/jplayer",
    supplied: "webmv, ogv, m4v",
    useStateClassSkin: true,
    autoBlur: false,
    smoothPlayBar: true,
    keyEnabled: true
  });

});
//]]>
</script>
</head>
<body>
<div id="jp_container_1" class="jp-video jp-video-270p" role="application" aria-label="media player">
  <div class="jp-type-playlist">
    <div id="jquery_jplayer_1" class="jp-jplayer"></div>
    <div class="jp-gui">
      <div class="jp-video-play">
        <button class="jp-video-play-icon" role="button" tabindex="0">play</button>
      </div>
      <div class="jp-interface">
        <div class="jp-progress">
          <div class="jp-seek-bar">
            <div class="jp-play-bar"></div>
          </div>
        </div>
        <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
        <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
        <div class="jp-controls-holder">
          <div class="jp-controls">
            <button class="jp-previous" role="button" tabindex="0">previous</button>
            <button class="jp-play" role="button" tabindex="0">play</button>
            <button class="jp-next" role="button" tabindex="0">next</button>
            <button class="jp-stop" role="button" tabindex="0">stop</button>
          </div>
          <div class="jp-volume-controls">
            <button class="jp-mute" role="button" tabindex="0">mute</button>
            <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
            <div class="jp-volume-bar">
              <div class="jp-volume-bar-value"></div>
            </div>
          </div>
          <div class="jp-toggles">
            <button class="jp-shuffle" role="button" tabindex="0">shuffle</button>
            <button class="jp-full-screen" role="button" tabindex="0">full screen</button>
          </div>
        </div>
        <div class="jp-details">
          <div class="jp-title" aria-label="title">&nbsp;</div>
        </div>
      </div>
    </div>
    <div class="jp-playlist">
      <ul>
        <!-- The method Playlist.displayPlaylist() uses this unordered list -->
        <li>&nbsp;</li>
      </ul>
    </div>
    <div class="jp-no-solution">
      <span>Update Required</span>
      To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
    </div>
  </div>
</div>
</body>

</html>
