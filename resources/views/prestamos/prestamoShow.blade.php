@extends('layouts.suabe')

@section('titulo')
Prestamos
@endsection

@section('contenido')

<div class="page-header mb-3 text-center pb-1">
    <br>
    <h3> 
        Préstamo - {{ $prestamo->id }}
    </h3>
</div>

<div class="row">
    <div class="col col-12 col-md-6 col-lg-4 mx-auto">
        <div class="card bg-primary">
            <div class="card-header">
                <h4> 
                    Datos
                </h4>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item border-primary">
                        Alumno: {{$prestamo->alumno->user->nombre_completo}}
                    </li>

                    <li class="list-group-item border-primary">
                        Atendió: {{$prestamo->operador->user->nombre_completo}}
                    </li>
                    <li class="list-group-item border-primary">
                        Fecha: {{$prestamo->created_at->format('d/m/Y')}}
                    </li>
                </ul>
            </div>
            <div class="card-footer d-flex-inline text-center">
                @can('delete', $prestamo)
                <form action="{{ route('prestamo.destroy', [$prestamo]) }}" method="POST" class=    "text-center" name="borrar">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
                @endcan
            </div>
        </div>
    </div>

    <div class="col col-12 col-md-6 col-lg-8 mx-auto">
        <div class="card border-primary">
            <div class="card-header">
                <h4> Ejemplares </h4>                
            </div>
            <div class="card-body">
                <table class="table w-100 d-block d-md-table rounded border-primary table-responsive table-sm text-center table-striped">
                    <thead>
                        <tr class="table-primary text-center">
                            <th scope="col" class="align-middle">ISBN</th>
                            <th scope="col" class="align-middle">Nombre</th>
                            <th scope="col" class="align-middle">Numero</th>
                            <th scope="col" class="align-middle"> </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prestamo->ejemplares as $ejemplar)
                        <tr class="table-secondary">
                            <th scope="row" class="align-middle">
                                {{ $ejemplar->libro->isbn }}
                            </th>
                            <th scope="row" class="align-middle">
                                {{ $ejemplar->libro->nombre }}
                            </th>
                            <td class="align-center">
                                {{ $ejemplar->numero }}
                            </td>
                            <td>
                                @if($ejemplar->prestamo->fecha_devolucion == null)
                                    <form action="{{ route('prestamo.devolver_ejemplar', [$prestamo, $ejemplar]) }}" method="POST">
                                        @method('patch')
                                        @csrf
                                        <button class="btn btn-warning">Devolver</button>
                                    </form>
                                @else
                                    Devuelto el: {{ \Carbon\Carbon::parse($ejemplar->prestamo->fecha_devolucion)->format('d/m/Y') }}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-center">

            </div>
        </div>
    </div>
</div>

@endsection 