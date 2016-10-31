@extends('layouts.app')
  @section('content')
  <h3>Listas de Reproducción Disponibles</h3>
  <table class="table">
    <thead>
      <th>Lista de Reproducción</th>
      <th>Duración</th>
      <th>Operacion</th>
    </thead>
    @foreach($playlists as $playlist)
      <tbody>
        <td>{{$playlist->name}}</td>
        <td>{{$playlist->duration}}</td>
        <td>
        {!! link_to_route('cine_tv.show', $title = 'Ver', $parameters = $playlist->id, $attributes = ['class'=>'btn btn-primary'])!!}
        </td>
      </tbody>
    @endforeach
  </table>
  {!!$playlists->render()!!}
@endsection