<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UsuarioEsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(\Auth::user()->es_estudiante || !\Auth::user()->operador->es_admin)
            return redirect('/libro')->with([
                'mensaje-alerta' => 'No cuenta con los permisos necesarios.',
                'titulo-alerta' => 'Acceso denegado!',
                'tipo-alerta' => 'alert-danger',
            ]);

        return $next($request);
    }
}
