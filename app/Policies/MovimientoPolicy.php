<?php

namespace App\Policies;

use App\Models\Movimiento;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MovimientoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return !$user->es_estudiante;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Movimiento  $movimiento
     * @return mixed
     */
    public function view(User $user)
    {
        return !$user->es_estudiante;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return !$user->es_estudiante;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Movimiento  $movimiento
     * @return mixed
     */
    public function update(User $user)
    {
        return !$user->es_estudiante;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Movimiento  $movimiento
     * @return mixed
     */
    public function delete(User $user, Movimiento $movimiento)
    {
        if(!$user->es_estudiante)
            if($user->operador->es_admin || $user->operador->user_id === $movimiento->operador_id)
                return true;
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Movimiento  $movimiento
     * @return mixed
     */
    public function restore(User $user)
    {
        if(!$user->es_estudiante)
            if($user->operador->es_admin)
                return true;
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Movimiento  $movimiento
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        if(!$user->es_estudiante)
            if($user->operador->es_admin)
                return true;
        return false;
    }
}
