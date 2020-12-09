@extends('layouts.suabe')

@section('titulo')
Libros
@endsection

@section('contenido')

<div class="page-header mb-3">
    <br>
    <div class="row">
        <div class="col col-11">
            <h3> 
            @can('create', App\Models\Libro::class)
                Inventario
            @else
                Catálogo
            @endcan
            </h3>
        </div>
        @can('create', App\Models\Libro::class)
        <div class="col col-1">
            <div class="text-mutex text-right mb-2" inline>
                <a href="{{ route('libro.create') }}" class="btn btn-primary"> Nuevo </a>
            </div>
        </div>
        @endcan
    </div>
</div>

<div class="card bg-secondary">
<div class="card-body">
<table class="table table-responsive table-sm text-center table-striped mb-0">
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
            <th scope="col">Ejemplares</th>
            @can('update', App\Models\Libro::class)
            <th scope="col"> </th>
            <th scope="col"> </th>
            <th scope="col"> </th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach ($libros as $libro)
        <tr class="table-secondary">
            <th scope="row" class="align-middle">{{ $libro->isbn }}</th>
            <td class="align-middle">{{ $libro->nombre }}</td>
            <td class="align-middle">{{ $libro->autor }}</td>
            <td class="align-middle">{{ $libro->editorial }}</td>
            <td class="align-middle">{{ $libro->edicion }}</td>
            <td class="align-middle">{{ $libro->anio }}</td>
            <td class="align-middle">{{ $libro->paginas }}</td>
            <td class="align-middle">{{ $libro->categoria->categoria }}</td>
            <td class="align-middle">
            @cannot('update', App\Models\Libro::class)
                {{ $libro->ejemplares_en_prestamo }}
            @else
                {{ $libro->ejemplares_count }}
            @endcannot
            </td>
            @can('update', App\Models\Libro::class)
            <td>
                <div class="row">
                    <div class="col col-12">
                        <a href="{{ route('libro.agregar_ejemplar',[$libro])}}" class="btn btn-sm btn-outline-warning btn-block">
                            +
                        </a>
                    </div>
                    <div class="col col-12">
                        <a href="{{ route('libro.eliminar_ejemplar',[$libro]) }}" class="btn btn-sm btn-outline-warning btn-block">
                            -
                        </a>
                    </div>
                </div>

            </td>
            <td class="align-middle">
                <a href="{{ route('libro.edit', [$libro]) }}" class="btn btn-primary">Editar</a>
            </td>
            <td class="align-middle">
                <form action="{{ route('libro.destroy', [$libro]) }}" method="POST" name="borrar">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
            @endcan
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>


@endsection 