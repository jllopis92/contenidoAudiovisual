@extends('layouts.controlPanel')
@section('content')

{{-- Codigos $create:
	0 = Objeto Editado
	1 = Objeto Creado
	2 = Objeto Eliminado
	3 = Ninguna Acción --}}

<div class="col-md-12" id="createAdverPopup" style="display: none">
	<div class="alert alert-success alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong id="strongTextCreate">Anuncio Creado. </strong> El anuncio ha sido creado exitosamente.
	</div>
</div>

<div class="col-md-12" id="deleteAdverPopup" style="display: none">
	<div class="alert alert-success alert-dismissable fade in" id="normalText">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong id="strongTextDelete">Anuncio Eliminado. </strong>El anuncio ha sido eliminado exitosamente.
	</div>
</div>

<div class="col-md-12" id="editUserPopup" style="display: none">
	<div class="alert alert-success alert-dismissable fade in" id="normalText">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong id="strongTextEdit">Usuario Editado. </strong> El usuario ha sido editado exitosamente.
	</div>
</div>

<div class="col-md-12" id="createUserPopup" style="display: none">
	<div class="alert alert-success alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong id="strongTextCreate">Usuario Creado. </strong> El usuario ha sido creado exitosamente.
	</div>
</div>

<div class="col-md-12" id="deleteUserPopup" style="display: none">
	<div class="alert alert-success alert-dismissable fade in" id="normalText">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong id="strongTextDelete">Usuario Eliminado. </strong>El usuario ha sido eliminado exitosamente.
	</div>
</div>

<div class="col-md-12" id="editMoviePopup" style="display: none">
	<div class="alert alert-success alert-dismissable fade in" id="normalText">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong id="strongTextEdit">Video Editado. </strong> El video ha sido editado exitosamente.
	</div>
</div>

<div class="col-md-12" id="createMoviePopup" style="display: none">
	<div class="alert alert-success alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong id="strongTextCreate">Video Creado. </strong> El video ha sido creado exitosamente.
	</div>
</div>

<div class="col-md-12" id="deleteMoviePopup" style="display: none">
	<div class="alert alert-success alert-dismissable fade in" id="normalText">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong id="strongTextDelete">Video Eliminado. </strong>El video ha sido eliminado exitosamente.
	</div>
</div>

<div class="col-md-12" id="createSubjectPopup" style="display: none">
	<div class="alert alert-success alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong id="strongTextCreate">Asignatura Creada. </strong> La Asignatura ha sido creada exitosamente.
	</div>
</div>

<div class="col-md-12" id="deleteSubjectPopup" style="display: none">
	<div class="alert alert-success alert-dismissable fade in" id="normalText">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong id="strongTextDelete">Asignatura Eliminada. </strong>La Asignatura ha sido eliminada exitosamente.
	</div>
</div>

<div class="col-md-12" id="createGenrePopup" style="display: none">
	<div class="alert alert-success alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong id="strongTextCreate">Genero Creado. </strong> El Genero ha sido creado exitosamente.
	</div>
</div>

<div class="col-md-12" id="deleteGenrePopup" style="display: none">
	<div class="alert alert-success alert-dismissable fade in" id="normalText">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong id="strongTextDelete">Genero Eliminado. </strong>El Genero ha sido eliminado exitosamente.
	</div>
</div>

<div class="col-md-12" id="createFormatPopup" style="display: none">
	<div class="alert alert-success alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong id="strongTextCreate">Formato Creado. </strong> El Formato ha sido creado exitosamente.
	</div>
</div>

<div class="col-md-12" id="deleteFormatPopup" style="display: none">
	<div class="alert alert-success alert-dismissable fade in" id="normalText">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong id="strongTextDelete">Formato Eliminado. </strong>El Formato ha sido eliminado exitosamente.
	</div>
</div>

<div class="col-md-12" id="createTypePopup" style="display: none">
	<div class="alert alert-success alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong id="strongTextCreate">Tipo de Video Creado. </strong> El Tipo de Video ha sido creado exitosamente.
	</div>
</div>

<div class="col-md-12" id="deleteTypePopup" style="display: none">
	<div class="alert alert-success alert-dismissable fade in" id="normalText">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong id="strongTextDelete">Tipo de Video Eliminado. </strong>El Tipo de Video ha sido eliminado exitosamente.
	</div>
</div>

<div class="col-md-12 orangeAndBoldText"> Bienvenido al panel de control, seleccione una opción en el menú lateral.</div>

@endsection


@section('page-style-files')
@stop

@section('page-js-files')
@stop

@section('page-js-script')
<script type="text/javascript">	
	var create = {{$create}};
	var what = "{{$what}}";
	var j = jQuery.noConflict();
	j(document).ready(function() {
		if(create == 1){
			if(what == "advertising"){
				document.getElementById("createAdverPopup").style.display="inline";
			}
			if(what == "movie"){
				document.getElementById("createMoviePopup").style.display="inline";
			}
			if(what == "user"){
				document.getElementById("createUserPopup").style.display="inline";
			}
			if(what == "type"){
				document.getElementById("createTypePopup").style.display="inline";
			}

			if(what == "genre"){
				document.getElementById("createGenrePopup").style.display="inline";
			}
			if(what == "format"){
				document.getElementById("createFormatPopup").style.display="inline";
			}
			if(what == "subject"){
				document.getElementById("createSubjectPopup").style.display="inline";
			}
		}else if(create == 2){
			if(what == "advertising"){
				document.getElementById("deleteAdverPopup").style.display="inline";
			}
			if(what == "movie"){
				document.getElementById("deleteMoviePopup").style.display="inline";
			}
			if(what == "user"){
				document.getElementById("deleteUserPopup").style.display="inline";
			}
			if(what == "type"){
				document.getElementById("deleteTypePopup").style.display="inline";
			}

			if(what == "genre"){
				document.getElementById("deleteGenrePopup").style.display="inline";
			}
			if(what == "format"){
				document.getElementById("deleteFormatPopup").style.display="inline";
			}
			if(what == "subject"){
				document.getElementById("deleteSubjectPopup").style.display="inline";
			}
		}else if(create == 0){
			if(what == "movie"){
				document.getElementById("editMoviePopup").style.display="inline";
			}
			if(what == "user"){
				document.getElementById("editUserPopup").style.display="inline";
			}
		}
	});
</script>
@stop