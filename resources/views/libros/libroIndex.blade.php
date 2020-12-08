@extends('layouts.suabe')

@section('contenido')

<div class="page-header mb-3">
    <br>
    <h3> Lista de libros</h3>
</div>
@if(!\Auth::user()->es_estudiante)
    <div class="text-mutex text-right mb-2">
        <a href="{{ route('libro.create') }}" class="btn btn-primary"> Nuevo </a>
    </div>
@endif

<div class="card bg-secondary">
<div class="card-body">
<table class="table table-sm table-striped">
    <thead>
        <tr class="table-primary text-center">
            <th scope="col">ISBN</th>
            <th scope="col">Nombre</th>
            <th scope="col">Autor</th>
            <th scope="col">Editorial</th>
            <th scope="col">Edición</th>
            <th scope="col">Año</th>
            <th scope="col">Páginas</th>
            <th scope="col">Categoría</th>
            <th scope="col"> </th>
            <th scope="col"> </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($libros as $libro)
        <tr class="table-secondary">
            <th scope="row">{{ $libro->isbn }}</th>
            <td>{{ $libro->nombre }}</td>
            <td>{{ $libro->autor }}</td>
            <td>{{ $libro->editorial }}</td>
            <td>{{ $libro->edicion }}</td>
            <td>{{ $libro->anio }}</td>
            <td>{{ $libro->paginas }}</td>
            <td>{{ $libro->categoria->categoria }}</td>
            <td>
                <a href="{{ route('libro.show', [$libro]) }}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <a href="{{ route('libro.show', [$libro]) }}" class="btn btn-danger">Borrar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>


@endsection 