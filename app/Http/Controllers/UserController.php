<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Operador;
use Illuminate\Http\Request;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function perfil()
    {
        return view('usuarios/perfil');
    }

    public function agregar_operador()
    {
        return view('usuarios/operadorForm');
    }

    public function registrar_operador(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'alpha', 'max:50'],
            'nickname' => ['required', 'alpha_dash', 'max:10', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', new Password, 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'apellido' => $request['apellido'],
            'es_estudiante' => $request['es_estudiante'],
            'nickname' => $request['nickname'],
            'password' => Hash::make($request['password']),
        ]);

        Operador::create([
            'user_id' => $user->id,
        ]);

        return redirect()->route('libro.index')->with([
            'mensaje-alerta' => 'Operador ' . $user->nombre_completo . ' agregado exitosamente.',
            'titulo-alerta' => 'Acción exitosa!',
            'tipo-alerta' => 'alert-success',
        ]);
    }

    public function actualizar_datos(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'alpha', 'max:50'],
            'nickname' => ['required', 'alpha_dash', 'max:10', Rule::unique('users')->ignore(\Auth::user()->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(\Auth::user()->id)],
        ]);

        $request = $request->all();

        \Auth::user()->fill([
                'name' => $request['name'],
                'apellido' => $request['apellido'],
                'email' => $request['email'],
                'nickname' => $request['nickname']
            ])->save();

        return redirect('perfil')->with([
            'mensaje-alerta' => 'Información actualizada con exito.',
            'tipo-alerta' => 'alert-success',
            'titulo-alerta' => 'Perfil actualizado!',
        ]);
    }

    public function actualizar_contrasenia(Request $request)
    {
        $input = $request->all();

        Validator::make($input, [
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', new Password, 'confirmed'],
        ])->after(function ($validator) use ($input) {
            if (! Hash::check($input['current_password'], \Auth::user()->password)) {
                $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
            }
        })->validate();

        \Auth::user()->fill([
            'password' => Hash::make($input['new_password']),
        ])->save();  

        return redirect('perfil')->with([
            'mensaje-alerta' => 'La contraseña fue actualizada con exito.',
            'tipo-alerta' => 'alert-success',
            'titulo-alerta' => 'Contraseña actualizado!',
        ]);
    }
}
