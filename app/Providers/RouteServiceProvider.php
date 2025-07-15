<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Ruta por defecto después de login (ya no la usaremos directamente).
     */
    public const HOME = '/dashboard';

    /**
     * Configuración de rutas.
     */

    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // ✅ Ruta de redirección según el tipo de usuario
            Route::get('/redirect', function () {
                $user = Auth::user();

                switch ($user->tipo_usuario) {
                    case 'admin':
                        return redirect('/admin/panel');
                    case 'profesor':
                        return redirect('/profesor/inicio');
                    case 'estudiante':
                        return redirect('/estudiante/inicio');
                    default:
                        return redirect('/');
                }
            })->middleware(['auth'])->name('redirect');
        });
    }


    /**
     * Limitadores de velocidad.
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
