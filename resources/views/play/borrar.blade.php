<!DOCTYPE html>
<html>
  <head>
    <title>Videojs ASS/SSA subtitles</title>

    <!-- npm -->
    {{-- <link href="node_modules/video.js/dist/video-js.min.css" rel="stylesheet">
    <link href="node_modules/libjass/libjass.css" rel="stylesheet">
    <script src="node_modules/video.js/dist/video.min.js"></script>
    <script src="node_modules/libjass/libjass.js"></script> --}}

    <!-- bower-->
{{-- {{ Html::style('assets/vendor/video.js/dist/video-js.min.css') }}
{{ Html::style('assets/vendor/libjass/libjass.css') }}

{{ Html::script('assets/vendor/video.js/dist/video.min.js') }}
{{ Html::script('assets/vendor/libjass/libjass.js') }} --}}

  {{--   <link href="..\vendor\bower_dl\videojs\dist\video-js.min.css" rel="stylesheet">
    <link href="/bower_components/libjass/libjass.css" rel="stylesheet">
    <script src="/bower_components/videojs/dist/video.min.js"></script>
    <script src="../vendor/bower_dl/libjass/libjass.js"></script> --}}


    <!-- src -->
 {{--    <link href="../css/videojs.ass.css" rel="stylesheet">
    <script src="../js/videojs.ass.js"></script> --}}
  </head>

  


  <body>
    <video  width="640" height="480" id="video" controls preload="metadata">  
  <source src="54Warcraft.2016.HC.HDRip.XViD.AC3-ETRG_dash.mpd">
     <source type="video/mp4" src="/files/convert/5825_Curso_de_Laravel_5.1.mp4" >   
     <track src="/files/subs/Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa" label="Espanol" kind="subtitles" srclang="es" default >
    <track src="/files/subs/Warcraft 2016 HDTC x264 AC3 TiTAN-fondonegro.ssa" label="English" kind="subtitles" srclang="en" default >

</video>
  </body>
</html>

    Contact GitHub API Training Shop Blog About 

