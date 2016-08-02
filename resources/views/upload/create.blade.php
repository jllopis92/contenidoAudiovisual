@extends('layouts.app')

@section('content')
@if (Auth::guest())
<script type="text/javascript">
    window.location = "/";//here double curly bracket
</script>
@else
    @if ((Auth::user()->tipo != "profesor") && (Auth::user()->tipo != "alumno"))

    <script type="text/javascript">
        window.location = "/";//here double curly bracket
    </script>
    @endif
@endif
<H3 style="margin-top: 0">Subir Video</H3>

{!! Form::open(['route' =>'upload.store', 'method'=>'POST', 'files'=> true ]) !!}

<div class = "form-group" style ="display: none;">
    {!! Form::label('usuario_id', 'usuario_id:') !!}
    {!! Form::text('usuario_id', Auth::user()->id) !!}
</div>

<div class = "form-group" style ="display: none;">
    {!! Form::label('state', 'State:') !!}
    {!! Form::text('state', 0) !!}
</div>

<div class = "form-group">
    {!! Form::label('name', 'Nombre:') !!}
    {!! Form::text('name', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('description', 'Descripcion:') !!}
    {!! Form::textarea('description', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('category', 'Categoría:') !!}
    {!!Form::select('category', Config::get('enums.category_types'))!!}
</div>

<div class = "form-group">
    {!! Form::label('language', 'Idioma:') !!}
    {!!Form::select('language', Config::get('enums.languages'))!!}
</div>

<div class = "form-group">
    {!! Form::label('imageRef', 'Imagen Referencial de Video:') !!}
    {!! Form::file('imageRef') !!}
</div>

<div class = "form-group">
    {!! Form::label('url', 'Video:') !!}
    {!! Form::file('url') !!}
</div>

<div class = "form-group">
    {!! Form::label('subtitle', 'Subtitulos:') !!}
    {!! Form::file('subtitle') !!}
</div>

<div class = "form-group">
    {!! Form::label('trailer', 'Trailer:') !!}
    {!! Form::file('trailer') !!}
</div>

<div class = "form-group">
    {!! Form::label('trailer_subtitle', 'Subtitulos de Trailer:') !!}
    {!! Form::file('trailer_subtitle') !!}
</div>

<div class = "form-group">
    {!! Form::label('asignatura_id', 'Asignatura:') !!}
    {!! Form::select('asignatura_id', $subject) !!}
</div>

<div class = "form-group">
    {!! Form::label('category', 'Categoría:') !!}
    {!!Form::select('category', Config::get('enums.category_types'))!!}
</div>

<div class = "form-group">
    {!! Form::label('shooting_format', 'Formato de Rodaje:') !!}
    {!!Form::select('shooting_format', Config::get('enums.shooting_format_types'))!!}
</div>

<div class = "form-group">
    {!! Form::label('creation_date', 'Fecha Creación:') !!}
    {!! Form::text('creation_date', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('production_year', 'Año de Produccion:') !!}
    <select name="production_year">
        <?php
        $years = range(date("Y"), date("Y", strtotime("now - 100 years")));
        foreach($years as $year){
            echo'<option value="'.$year.'">'.$year.'</option>';
        }
        ?>
    </select>
</div>

<div class = "form-group">
    {!! Form::label('direction', 'Dirección:') !!}
    {!! Form::text('direction', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('direction_assistant', 'Asistente de Dirección:') !!}
    {!! Form::text('direction_assistant', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('casting', 'Casting:') !!}
    {!! Form::text('casting', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('continuista', 'Continuista:') !!}
    {!! Form::text('continuista', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('script', 'Guion:') !!}
    {!! Form::text('script', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('production', 'Produccion:') !!}
    {!! Form::text('production', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('production_assistant', 'Asistente de Produccion:') !!}
    {!! Form::text('production_assistant', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('photografic_direction', 'Dirección de Fotografia:') !!}
    {!! Form::text('photografic_direction', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('camara', 'Camara:') !!}
    {!! Form::text('camara', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('camara_assistant', 'Asistente de Camara:') !!}
    {!! Form::text('camara_assistant', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('art_direction', 'Direccion de Arte:') !!}
    {!! Form::text('art_direction', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('sonorous_register', 'Registro Sonoro:') !!}
    {!! Form::text('sonorous_register', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('mounting', 'Montaje:') !!}
    {!! Form::text('mounting', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('image_postproduction', 'Post-produccion de Imagen:') !!}
    {!! Form::text('image_postproduction', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('sound_postproduction', 'Post-produccion de Sonido:') !!}
    {!! Form::text('sound_postproduction', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('catering', 'Catering:') !!}
    {!! Form::text('catering', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('music', 'Música:') !!}
    {!! Form::text('music', null, ['class'=> 'form-control']) !!}
</div>

<div class = "form-group">
    {!! Form::label('actors', 'Actores:') !!}
    {!! Form::text('actors', null, ['class'=> 'form-control']) !!}
</div>
    {!! Form::submit('Registrar',['class' =>'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection

{{-- <div class = "form-group">
    {!! Form::label('actors', 'Actores:') !!}
    {!! Form::text('actors', null, ['class'=> 'form-control', 'placeholder' => 'Ingresa a los actores']) !!}
</div> --}}
