@extends('layouts.authsuabe')

@section('titulo')
Inicio de sesión
@endsection

@section('contenido')

<form class="card bg-primary mb-3" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="card-body">
        <h4 class="card-title">Inicia sesión en tu cuenta</h4>
        <div class="row">
            <div class="col col-12 col-md-6">
                <div class="form-group">
                    <label class="form-label" for="nickname">Nombre de usuario</label>
                    <input type="text" class="form-control" id="nickname" name="nickname" aria-describedby="nicknameHelp" placeholder="Introduce tu nombre de usuario" value="{{ old('nickname') }}" required autofocus>
                </div>
            </div>
            <div class="col col-12 col-md-6">
                <div class="form-group">
                    <label class="form-label" for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" placeholder="Introduce tu contraseña" name="password" required>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-center">
        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </div>
</form>
<div class="text-center text-muted">
    ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a>
</div>
@endsection