@extends('layouts.suabe')

@section('titulo')
Prestamos
@endsection

@section('contenido')


<div class="row">
    <div class="col col-6 mt-5 mx-auto">
        <form class="card border-primary" action="{{ route('prestamo.store') }}" method="POST">
            <div class="card-header">
                <h4 class="card-title">Nuevo prestamo</h4>
            </div>
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="alumno_id">Alumno:</label>
                    <select name = "alumno_id" class="custom-select">
                        @foreach($alumnos as $alumno)
                            <option value="{{ $alumno->user_id }}">{{ $alumno->user->nombre_completo }} </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="ejemplar_1">Ejemplar 1:</label>
                    <select name = "ejemplar_1" class="custom-select">
                        @foreach($ejemplares as $ejemplar)
                            <option value="{{ $ejemplar->id }}">{{ $ejemplar->isbn }} - {{ $ejemplar->numero }} - {{ $ejemplar->libro->nombre }}  </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="ejemplar_2">Ejemplar 2:</label>
                    <select name = "ejemplar_2" class="custom-select">
                        @foreach($ejemplares as $ejemplar)
                            <option value="{{ $ejemplar->id }}">{{ $ejemplar->isbn }} - {{ $ejemplar->numero }} - {{ $ejemplar->libro->nombre }}  </option>
                        @endforeach
                    </select>
                </div>

                <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="usar_2" name="usar_2" value=1>
                        <label class="custom-control-label" for="usar_2">Utilizar</label>
                    </div>

                <div class="form-group">
                    <label for="ejemplar_3">Ejemplar 1:</label>
                    <select name = "ejemplar_3" class="custom-select">
                        @foreach($ejemplares as $ejemplar)
                            <option value="{{ $ejemplar->id }}">{{ $ejemplar->isbn }} - {{ $ejemplar->numero }} - {{ $ejemplar->libro->nombre }}  </option>
                        @endforeach
                    </select>
                </div>
                <div class="custom-control form-group custom-switch">
                        <input type="checkbox" class="custom-control-input" id="usar_3" name="usar_3" value=1>
                        <label class="custom-control-label" for="usar_3">Utilizar</label>
                </div>

            </div>
            <div class="card-footer text-center">
                <a href="{{ route('prestamo.index') }}" class="btn btn-primary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</div>

@endsection