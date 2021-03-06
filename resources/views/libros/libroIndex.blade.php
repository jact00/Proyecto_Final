@extends('layouts.suabe')

@section('titulo')
Libros
@endsection

@section('contenido')

<div class="page-header text-center mb-3">
    <br>
        <h3> 
            @can('create', App\Models\Libro::class)
            Inventario
            @else
            Catálogo
            @endcan
        </h3>
        @can('create', App\Models\Libro::class)
        <div class="text-right mb-2" inline>
            <a href="{{ route('libro.create') }}" class="btn btn-success"> Agregar </a>
        </div>
        @endcan
</div>

<div class="card border-primary">
    <div class="card-body table-responsive">
        <table class="table table-sm text-center table-hover mb-0">
            <thead>
                <tr class="table-dark text-center">
                    <th scope="col">ISBN</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Editorial</th>
                    <th scope="col">Edición</th>
                    <th scope="col">Año</th>
                    <th scope="col">Páginas</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">
                    @cannot('view', App\Models\Libro::class)
                        Disponibles
                    @else
                        Ejemplares
                    @endcannot
                    </th>
                    @can('update', App\Models\Libro::class)
                    <th scope="col"> </th>
                    <th scope="col"> </th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                <tr >
                    <th scope="row" class="align-middle">
                        @can('view', App\Models\Libro::class)
                        <a href="{{ route('libro.show',[$libro]) }}" class="btn btn-link">
                            {{ $libro->isbn }}
                        </a>
                        @else
                        {{ $libro->isbn}}
                        @endcan
                    </th>
                    <td class="align-middle text-left">{{ $libro->nombre }}</td>
                    <td class="align-middle text-left">{{ $libro->autor }}</td>
                    <td class="align-middle text-left">{{ $libro->editorial }}</td>
                    <td class="align-middle">{{ $libro->edicion }}</td>
                    <td class="align-middle">{{ $libro->anio }}</td>
                    <td class="align-middle">{{ $libro->paginas }}</td>
                    <td class="align-middle text-left">{{ $libro->categoria->categoria }}</td>
                    <td class="align-middle">
                        @cannot('update', App\Models\Libro::class)
                        {{ $libro->ejemplares_en_prestamo }}
                        @else
                        {{ $libro->ejemplares_count }}
                        @endcannot
                    </td>
                    @can('update', App\Models\Libro::class)
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