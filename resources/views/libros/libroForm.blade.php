@extends('layouts.suabe')

@section('titulo')
Libros
@endsection

@section('contenido')

<div class="row">
    <div class="col col-8 mx-auto">
        @if(isset($libro))
        <form class="card bg-primary" action="{{ route('libro.update', [$libro]) }}" method="POST">
            <div class="card-header">
                <h4 class="card-title">Editar libro</h4>
            </div>
            @method('patch')
        @else
        <form class="card bg-primary" action="{{ route('libro.store') }}" method="POST">
            <div class="card-header">
                <h4 class="card-title"> Nuevo libro</h4>
            </div>
        @endif
            @csrf
            <div class="card-body">

                <div class="row">
                <div class ="col col-6">

                <div class="form-group">
                <label for="isbn">ISBN:</label>
                @if($errors->has('isbn'))
                    <input type="number" class="form-control is-invalid" name="isbn" value="{{ old('isbn') }}">
                @elseif(isset($libro))
                    <input type="number" class="form-control" name="isbn" value="{{ $libro->isbn }}" readonly>
                @else
                    <input type="number" class="form-control" name="isbn" value="{{ old('isbn') ?? '' }}">
                @endif
                </div>

                </div>
                <div class ="col col-6">

                <div class="form-group">
                <label for="nombre">Nombre:</label>
                @if($errors->has('nombre'))
                    <input type="text" class="form-control is-invalid" name="nombre" value="{{ old('nombre') }}">
                @else
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') ?? $libro->nombre ?? '' }}">
                @endif
                </div>

                </div>
                </div>

                <div class="row">
                <div class ="col col-6">

                <div class="form-group">
                <label for="autor">Autor:</label>
                @if($errors->has('autor'))
                    <input type="text" class="form-control is-invalid" name="autor" value="{{ old('autor') }}">
                @else
                    <input type="text" class="form-control" name="autor" value="{{ old('autor') ?? $libro->autor ?? '' }}">
                @endif
                </div>
                    
                </div>
                <div class ="col col-6">

                <div class="form-group">
                <label for="editorial">Editorial:</label>
                @if($errors->has('editorial'))
                    <input type="text" class="form-control is-invalid" name="editorial" value="{{ old('editorial') }}">
                @else
                    <input type="text" class="form-control" name="editorial" value="{{ old('editorial') ?? $libro->editorial ?? '' }}">
                @endif
                </div>

                </div>
                </div>

                <div class="row">
                <div class ="col col-6">
                    
                <div class="form-group">
                <label for="edicion">Edición:</label>
                @if($errors->has('edicion'))
                    <input type="number" class="form-control is-invalid" name="edicion" value="{{ old('edicion') }}">
                @else
                    <input type="number" class="form-control" name="edicion" value="{{ old('edicion') ?? $libro->edicion ?? '' }}">
                @endif
                </div>

                </div>
                <div class ="col col-6">

                <div class="form-group">
                <label for="categoria_id">Categoria:</label>
                <select name = "categoria_id" class="custom-select">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }} </option>
                    @endforeach
                </select>
                </div>

                </div>
                </div>

                <div class="row">
                <div class ="col col-6">

                <div class="form-group">
                <label for="anio">Año:</label>
                @if($errors->has('anio'))
                    <input type="number" class="form-control is-invalid" name="anio" value="{{ old('anio') }}">
                @else
                    <input type="number" class="form-control" name="anio" value="{{ old('anio') ?? $libro->anio ?? '' }}">
                @endif
                </div>
                    
                </div>
                <div class ="col col-6">

                <div class="form-group">
                <label for="paginas">Páginas:</label>
                @if($errors->has('paginas'))
                    <input type="number" class="form-control is-invalid" name="paginas" value="{{ old('paginas') }}">
                @else
                    <input type="number" class="form-control" name="paginas" value="{{ old('paginas') ?? $libro->paginas ?? '' }}">
                @endif
                </div>

                </div>
                </div>


            </div>
            <div class="card-footer text-center">
                <a href="{{ route('libro.index') }}" class="btn btn-primary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</div>

@endsection