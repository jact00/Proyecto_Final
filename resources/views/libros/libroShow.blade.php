@extends('layouts.suabe')

@section('titulo')
Libros
@endsection

@section('contenido')

<div class="page-header mb-3 text-center pb-1">
    <br>
    <h3> 
        {{ $libro->isbn }} - {{ $libro->nombre }}
    </h3>
</div>

<div class="row">
    <div class="col col-12 col-md-6 col-lg-5 mx-auto">
        <div class="card bg-primary">
            <div class="card-header">
                <h4> 
                    Datos
                </h4>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item border-primary">
                        Autor: {{$libro->autor}}
                    </li>

                    <li class="list-group-item border-primary">
                        Editorial: {{$libro->editorial}}
                    </li>
                    <li class="list-group-item border-primary">
                        Edición: {{$libro->edicion}}
                    </li>
                    <li class="list-group-item border-primary">
                        Año: {{$libro->anio}}
                    </li>
                    <li class="list-group-item border-primary">
                        Páginas: {{$libro->paginas}}
                    </li>
                    <li class="list-group-item border-primary">
                        Categoria: {{$libro->categoria->categoria}}
                    </li>
                </ul>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-6 text-right">
                        <a href="{{ route('libro.update', [$libro]) }}" class="btn btn-primary" inline> Editar </a>
                    </div>
                    <div class="col-6 text-left">
                        <form action="{{ route('libro.destroy', [$libro]) }}" method="POST" name="borrar">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col col-12 col-md-6 col-lg-5 mx-auto">
        <div class="card border-primary">
            <div class="card-header">
                <h4> Ejemplares </h4>                
            </div>
            <div class="card-body">
                <table class="table table-sm text-center table-striped">
                    <thead>
                        <tr class="table-primary text-center">
                            <th scope="col">Número</th>
                            <th scope="col">Estado</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($libro->ejemplares as $ejemplar)
                        <tr class="table-secondary">
                            <th scope="row" class="align-middle">
                                {{ $ejemplar->numero }}
                            </th>
                            <td class="align-center">
                                @if($ejemplar->en_prestamo)
                                <a href="{{route('prestamo.show', [$ejemplar->prestamo_actual->first()->id])}}" class= "btn btn-link">En prestamo</a>
                                @else
                                Disponible 
                                @endif
                            </td>
                            <td>
                                @if(!$ejemplar->en_prestamo)
                                <a href="{{ route('libro.eliminar_ejemplar', [$libro, $ejemplar]) }}" class="btn btn-sm btn-outline-danger">
                                    Eliminar
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('libro.agregar_ejemplar',[$libro])}}" class="btn btn-sm btn-primary">
                    Agregar
                </a>
            </div>
        </div>
    </div>
</div>

@endsection 