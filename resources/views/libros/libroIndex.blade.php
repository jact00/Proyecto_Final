@extends('layouts.suabe')

@section('titulo')
Libros
@endsection

@section('contenido')

<div class="page-header mb-3">
    <br>
    <div class="row">
        <div class="col col-11">
            <h3> Lista de libros</h3>
        </div>
        <div class="col col-1">
            <div class="text-mutex text-right mb-2" inline>
                <a href="{{ route('libro.create') }}" class="btn btn-primary"> Nuevo </a>
            </div>
        </div>
    </div>
</div>

<div class="card bg-secondary">
<div class="card-body">
<table class="table table-responsive table-sm table-striped mb-0">
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
                <a href="{{ route('libro.edit', [$libro]) }}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('libro.destroy', [$libro]) }}" method="POST" name="borrar">
                    @method('DELETE')
                    @csrf
                <button type="submit" class="btn btn-danger">Borrar</button>
    </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>


@endsection 