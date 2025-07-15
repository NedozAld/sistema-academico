<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificarRol
{
    /**
     * Maneja una solicitud entrante y verifica el tipo de usuario.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $usuario = Auth::user();

        if (!$usuario || !in_array($usuario->tipo_usuario, $roles)) {
            abort(403, 'Acceso no autorizado.');
        }

        return $next($request);
    }
}
