@extends('suabe.app')

@section('contenido')

<br>
<div class="row">
    <div class="col-lg-5">
        @if(isset($libro))
        <form action="{{ route('libro.update', [$libro]) }}" method="POST">
            <legend>Editar Libro</legend>
            @method('patch')
        @else
        <form action="{{ route('libro.store') }}" method="POST">
            <legend>Nuevo Libro</legend>
        @endif

            @csrf
            <fieldset>
                <div class="form-group">
                <label for="isbn">ISBN:</label>
                @if($errors->has('isbn'))
                    <input type="number" class="form-control is-invalid" name="isbn" value="{{ old('isbn') }}">
                    <div class="invalid-feedback">
                        <ul>
                        @foreach($errors->get('isbn') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                        </ul>
                    </div>
                @elseif(isset($libro))
                    <input type="number" name="isbn" value="{{ $libro->isbn }}" readonly>
                @else
                    <input type="number" class="form-control" name="isbn" value="{{ old('isbn') ?? '' }}">
                @endif
                </div>

                <div class="form-group">
                <label for="nombre">Nombre:</label>
                @if($errors->has('nombre'))
                    <input type="text" class="form-control is-invalid" name="nombre" value="{{ old('nombre') }}">
                    <div class="invalid-feedback">
                        <ul>
                        @foreach($errors->get('nombre') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                        </ul>
                    </div>
                @else
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') ?? $libro->nombre ?? '' }}">
                @endif
                </div>

                <div class="form-group">
                <label for="autor">Autor:</label>
                @if($errors->has('autor'))
                    <input type="text" class="form-control is-invalid" name="autor" value="{{ old('autor') }}">
                    <div class="invalid-feedback">
                        <ul>
                        @foreach($errors->get('autor') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                        </ul>
                    </div>
                @else
                    <input type="text" class="form-control" name="autor" value="{{ old('autor') ?? $libro->autor ?? '' }}">
                @endif
                </div>

                <div class="form-group">
                <label for="editorial">Editorial:</label>
                @if($errors->has('editorial'))
                    <input type="text" class="form-control is-invalid" name="editorial" value="{{ old('editorial') }}">
                    <div class="invalid-feedback">
                        <ul>
                        @foreach($errors->get('editorial') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                        </ul>
                    </div>
                @else
                    <input type="text" class="form-control" name="editorial" value="{{ old('editorial') ?? $libro->editorial ?? '' }}">
                @endif
                </div>

                <div class="form-group">
                <label for="edicion">Edición:</label>
                @if($errors->has('edicion'))
                    <input type="number" class="form-control is-invalid" name="edicion" value="{{ old('edicion') }}">
                    <div class="invalid-feedback">
                        <ul>
                        @foreach($errors->get('edicion') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                        </ul>
                    </div>
                @else
                    <input type="number" class="form-control" name="edicion" value="{{ old('edicion') ?? $libro->edicion ?? '' }}">
                @endif
                </div>

                <div class ="d-flex">
                <div class="form-group">
                <label for="anio">Año:</label>
                @if($errors->has('anio'))
                    <input type="number" class="form-control is-invalid" name="anio" value="{{ old('anio') }}">
                    <div class="invalid-feedback">
                        <ul>
                        @foreach($errors->get('anio') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                        </ul>
                    </div>
                @else
                    <input type="number" class="form-control" name="anio" value="{{ old('anio') ?? $libro->anio ?? '' }}">
                @endif
                </div>

                <div class="form-group">
                <label for="paginas">Páginas:</label>
                @if($errors->has('anio'))
                    <input type="number" class="form-control is-invalid" name="paginas" value="{{ old('paginas') }}">
                    <div class="invalid-feedback">
                        <ul>
                        @foreach($errors->get('paginas') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                        </ul>
                    </div>
                @else
                    <input type="number" class="form-control" name="paginas" value="{{ old('paginas') ?? $libro->paginas ?? '' }}">
                @endif
                </div>
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </fieldset>
        </form>
    </div>
</div>

@endsection