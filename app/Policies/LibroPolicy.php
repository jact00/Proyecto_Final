<?php

namespace App\Policies;

use App\Models\Libro;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LibroPolicy
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
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Libro  $libro
     * @return mixed
     */
    public function view(User $user)
    {
        return !($user->es_estudiante);
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
     * @param  \App\Models\Libro  $libro
     * @return mixed
     */
    public function update(User $user)
    {
        return !($user->es_estudiante);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Libro  $libro
     * @return mixed
     */
    public function delete(User $user)
    {
        return !($user->es_estudiante);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Libro  $libro
     * @return mixed
     */
    public function restore(User $user)
    {
        if(!$user->es_estudiante)
        {
            return $user->operador->es_admin;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Libro  $libro
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        if(!$user->es_estudiante)
        {
            return $user->operador->es_admin;
        }
        return false;
    }

    public function before(User $user, $ability)
    {
        if (!$user->es_estudiante) {
            if($user->operador->es_admin)
                return true;
        }
    }
}
