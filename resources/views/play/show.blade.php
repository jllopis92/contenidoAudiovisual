@extends('layouts.app')
@section('content')
    <script type="text/javascript" src="../js/VideoFlowPlayer/flowplayer.min.js"></script>

    <video class="Vid854" controls width="600" height="400" preload >
    	<source src="/files/{{$movie->url}}" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
	 	<source src="/files/{{$movie->url}}" type='video/webm; codecs="vp8, vorbis"'>
	 	<source src="/files/{{$movie->url}}" type='video/ogg; codecs="theora, vorbis"'>
	 	<div class="Vid854">
			<a id="player" href="VideoTest-Flash.mp4"></a>
			<script>flowplayer("player", "../js/VideoFlowPlayer/flowplayer.swf");</script>
		</div>
	</video>

    <!-- <video src="/files/{{$movie->url}}" controls width="600" height="400">
    </video> -->
@stop