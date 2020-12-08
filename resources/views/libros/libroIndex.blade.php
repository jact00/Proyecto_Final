@extends('layouts.suabe')

@section('titulo')
Libros
@endsection

@section('contenido')

<div class="page-header mb-3">
    <br>
    <h3> Lista de libros</h3>
    <div class="text-mutex text-right mb-2">
        <a href="{{ route('libro.create') }}" class="btn btn-primary"> Nuevo </a>
    </div>
</div>

<div class="card bg-secondary">
<div class="card-body">
<table class="table table-responsive table-sm table-striped">
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
                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        Acciones
                    </button>
                    <div class="dropdown-menu bg-secondary">
                        <a href="{{ route('libro.edit', [$libro]) }}" class="dropdown-item bg-warning">
                            Editar
                        </a>
                        <form action="{{ route('libro.destroy', [$libro]) }}" method="POST" name="borrar">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="dropdown-item bg-danger">Borrar</button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>


@endsection 