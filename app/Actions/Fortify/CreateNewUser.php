<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Alumno;
use App\Models\Operador;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'alpha', 'max:50'],
            'nickname' => ['required', 'alpha_dash', 'max:10', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'apellido' => $input['apellido'],
            'es_estudiante' => $input['es_estudiante'],
            'nickname' => $input['nickname'],
            'password' => Hash::make($input['password']),
        ]);

        if($user->es_estudiante)
        {
            Alumno::create([
                'user_id' => $user->id,
            ]);
        }
        else
        {
            Operador::create([
                'user_id' => $user->id,
            ]);
        }

        return $user;
    }
}
