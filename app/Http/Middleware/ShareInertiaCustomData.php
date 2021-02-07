<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace App\Http\Middleware;


use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ShareInertiaCustomData
{
    public function handle($request, $next)
    {
        Inertia::share([
            'menu' => ['resources' => Auth::user()->hasAnyRole(['admin', 'editor'])]
        ]);

        return $next($request);
    }
}
