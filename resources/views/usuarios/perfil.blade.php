@extends('layouts.suabe')

@section('titulo')
Perfil
@endsection

@section('contenido')

<div class="page-header mb-3 text-left pb-1">
    <br>
    <h3> 
        Perfil de usuario
    </h3>
</div>

<div class="row">
    <div class ="col col-12 col-sm-6 col-md-5">
        <h5> Actualizar Información </h5>
        <p> Si deseas actualizar tu información únicamente cambia la información necesaria y presiona el botón "Guardar"</p>
    </div>

    <div class="col col-12 col-sm-6 col-md-7 mx-auto">
        <form class="card border-primary mb-3" method="POST" action="">
            @csrf
            <div class="card-header">
                <h5> 
                    Información
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="name">Nombre</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="Introduzca su nombre" value="{{ old('name') ?? \Auth::user()->name }}" required autofocus>
                        </div>
                    </div>
                    <div class="col col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="apellido">Apellido</label>
                            <input type="text" id="apellido" class="form-control" name="apellido" placeholder="Introduzca su apellido" value="{{ old('apellido') ?? \Auth::user()->apellido }}" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="nickname">Nombre de usuario</label>
                            <input type="text" id="nickname" class="form-control" name="nickname" placeholder="Nombre de usuario" value="{{ old('nickname') ?? \Auth::user()->nickname }}" required autofocus>
                        </div>
                    </div>
                    <div class="col col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="Introduzca su email" value="{{ old('email') ?? \Auth::user()->email }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary"> Guardar </button>
            </div>
        </form>
    </div>
</div>

<hr>

<div class="row d-flex flex-row-reverse">
    <div class ="col col-12 col-sm-6 col-md-7">
        <h5> Actualizar Contraseña </h5>
        <p> Asegurate de usar una contraseña segura y que te sea difícil olvidar.</p>
    </div>

    <div class="col col-12 col-sm-6 col-md-5 mx-auto">
        <form class="card border-warning mb-3" method="POST" action="">
            @csrf
            <div class="card-header">
                <h5> 
                    Información
                </h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="form-label" for="old_password">Antigua contraseña</label>
                    <input type="password" id="old_password" class="form-control" name="old_password" placeholder="Antigua contraseña" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="new_password">Nueva contraseña</label>
                    <input type="password" id="new_password" class="form-control" name="new_password" placeholder="Nueva contraseña" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="new_password_confirmation">Confirmar nueva contraseña</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" placeholder="Confirmar nueva contraseña" required>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-warning"> Guardar </button>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class ="col col-12 col-sm-6 col-md-5">
        <h5> Libros en posesión </h5>
        <p>Aquí se muestra la lista de libros que aun no has devuelto</p>
    </div>

    <div class="col col-12 col-sm-6 col-md-7 mx-auto">
        <form class="card border-primary mb-3" method="POST" action="">
            @csrf
            <div class="card-header">
                <h5> 
                    Información
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="name">Nombre</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="Introduzca su nombre" value="{{ old('name') ?? \Auth::user()->name }}" required autofocus>
                        </div>
                    </div>
                    <div class="col col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="apellido">Apellido</label>
                            <input type="text" id="apellido" class="form-control" name="apellido" placeholder="Introduzca su apellido" value="{{ old('apellido') ?? \Auth::user()->apellido }}" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="nickname">Nombre de usuario</label>
                            <input type="text" id="nickname" class="form-control" name="nickname" placeholder="Nombre de usuario" value="{{ old('nickname') ?? \Auth::user()->nickname }}" required autofocus>
                        </div>
                    </div>
                    <div class="col col-12 col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="Introduzca su email" value="{{ old('email') ?? \Auth::user()->email }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary"> Guardar </button>
            </div>
        </form>
    </div>
</div>

@endsection 