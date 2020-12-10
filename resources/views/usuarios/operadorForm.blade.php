@extends('layouts.suabe')

@section('titulo')
Nuevo Operador
@endsection

@section('contenido')

<div class="row">
    <div class="col mt-5 col-10 col-lg-8 col-xl-7 mx-auto">
        <form class="card bg-primary mb-3" method="POST" action="{{ route('registrar_operador') }}">
            @csrf
            <input id="es_estudiante" name="es_estudiante" type="hidden" value=0>

            <div class="card-header">
                <h4 class="card-title">Nuevo Operador</h4>
            </div>
                
            <div class="card-body">
                <div class="row">
                    <div class="col col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="name">Nombre</label>
                            @if($errors->has('name'))
                            <input type="text" id="name" class="form-control is-invalid" name="name" placeholder="Nombre del operador" value="{{ old('name') }}" required autofocus>
                            @else
                            <input type="text" id="name" class="form-control" name="name" placeholder="Nombre del operador" value="{{ old('name') }}" required autofocus>
                            @endif
                        </div>
                    </div>

                    <div class="col col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="apellido">Apellido</label>
                            @if($errors->has('apellido'))
                            <input type="text" id="apellido" class="form-control is-invalid" name="apellido" placeholder="Apellido del operador" value="{{ old('apellido') }}" required autofocus>
                            @else
                            <input type="text" id="apellido" class="form-control" name="apellido" placeholder="Apellido del operador" value="{{ old('apellido') }}" required autofocus>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-12 col-md-6">
                        <div class="form-group">                            
                            <label class="form-control-label" for="nickname">Nombre de usuario</label>
                            @if($errors->has('nickname'))
                            <input type="text" id="nickname" class="form-control is-invalid" name="nickname" placeholder="Nombre de usuario" value="{{ old('nickname') }}" required autofocus>
                            @else
                            <input type="text" id="nickname" class="form-control" name="nickname" placeholder="Nombre de usuario" value="{{ old('nickname') }}" required autofocus>
                            @endif
                        </div>
                    </div>

                    <div class="col col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            @if($errors->has('email'))
                            <input type="email" id="email" class="form-control is-invalid" name="email" placeholder="Email del operador" value="{{ old('email') }}" required>
                            @else
                            <input type="email" id="email" class="form-control" name="email" placeholder="Email del operador" value="{{ old('email') }}" required>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="password">Contraseña</label>
                            @if($errors->has('password'))
                            <input type="password" id="password" class="form-control is-invalid" name="password" placeholder="Contraseña" required>
                            @else
                            <input type="password" id="password" class="form-control" name="password" placeholder="Contraseña" required>
                            @endif
                        </div>
                    </div>

                    <div class="col col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="password_confirmation">Confirmar contraseña</label>
                            @if($errors->has('password_confirmation'))
                            <input type="password" id="password_confirmation is-invalid" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña" required>
                            @else
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña" required>
                            @endif
                        </div>
                    </div>
                </div>       
            </div>

            <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary"> Registrar </button>
            </div>
        </form>
        <div class="text-center text-muted mb-3">
            <a href="{{ route('login') }}">Ya estoy registrado</a>
        </div>
    </div>
</div>

@endsection