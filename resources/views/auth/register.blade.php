@extends('layouts.authsuabe')

@section('titulo')
Registro
@endsection

@section('contenido')
<form class="card bg-primary mb-3" method="POST" action="{{ route('register') }}">
    @csrf
    <input id="es_estudiante" name="es_estudiante" type="hidden" value=1>
        
    <div class="card-body">
        <h4 class="card-title">Regístrate</h4>
        <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label class="form-label" for="name">Nombre</label>
                <input type="text" id="name" class="form-control" name="name" placeholder="Introduzca su nombre" value="{{ old('name') }}" required autofocus>
            </div>
            <div class="form-group">
                <label class="form-label" for="apellido">Apellido</label>
                <input type="text" id="apellido" class="form-control" name="apellido" placeholder="Introduzca su apellido" value="{{ old('apellido') }}" required autofocus>
            </div>

            
            <div class="form-group">
                <label class="form-label" for="nickname">Nombre de usuario</label>
                <input type="text" id="nickname" class="form-control" name="nickname" placeholder="Nombre de usuario" value="{{ old('nickname') }}" required autofocus>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="Introduzca su email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Contraseña</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Contraseña" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="password_confirmation">Confirmar contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña" required>
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

  @endsection
