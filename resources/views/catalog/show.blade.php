@extends('master')

@section('content')

<div class="row">

    <div class="col-sm-4">
        <img src="{{$pelicula['poster']}}" style="height:400px"/>
    </div>
    <div class="col-sm-8">
        <h1>{{$pelicula['title']}}</h1>
        <h4>Año: {{$pelicula['year']}}</h4>
        <h4>Director: {{$pelicula['director']}}</h4>
        <p><strong>Resumen: </strong>{{$pelicula['synopsis']}}</p>
        <p><strong>Estado: </strong>
            @if($pelicula['rented'])
                Película actualmente alquilada
            @else
                Película no alquilada
            @endif
        </p>
        @if($pelicula['rented'])
            <button type="button" class="btn btn-danger">Devolver la película</button>
        @else
            <button type="button" class="btn btn-primary">Alquilar película</button>
        @endif
        <a type="button" class="btn btn-warning">Editar película</a>
        <button type="button" class="btn btn-light">Volver al listado</button>
    </div>
</div>

@endsection