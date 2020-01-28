@extends('master')

@section('content')

<div class="row">

    <div class="col-sm-4">
        <img src="{{$pelicula->poster}}" style="height:400px"/>
    </div>
    <div class="col-sm-8">
        <h1>{{$pelicula->title}}</h1>
        <h4>Año: {{$pelicula->year}}</h4>
        <h4>Director: {{$pelicula->director}}</h4>
        <p><strong>Resumen: </strong>{{$pelicula->synopsis}}</p>
        <p><strong>Estado: </strong>
            @if($pelicula->rented)
                Película actualmente alquilada
            @else
                Película no alquilada
            @endif
        </p>
        @if($pelicula->rented)
            <form action="{{action('CatalogController@putReturn', $pelicula->id)}}" 
                method="POST" style="display:inline">
                @method('PUT')
                @csrf
                <button type="submit" class="btn btn-danger">Devolver la película</button>
            </form>
        @else
            <form action="{{action('CatalogController@putRent', $pelicula->id)}}" 
                method="POST" style="display:inline">
                @method('PUT')
                @csrf
                <button type="submit" class="btn btn-primary">Alquilar película</button>
            </form>
        @endif
        <a type="button" class="btn btn-warning" href={{'/catalog/edit/'.$pelicula->id}}>Editar película</a>
        <a type="button" class="btn btn-light" href={{action('CatalogController@getIndex')}}>Volver al listado</a>
        <form action="{{action('CatalogController@deleteMovie', $pelicula->id)}}" 
            method="POST" style="display:inline">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
    </div>
</div>

@endsection