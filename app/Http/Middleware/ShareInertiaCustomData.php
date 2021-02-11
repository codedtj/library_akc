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
        $user = Auth::user();

        if ($user)
            Inertia::share([
                'menu' => [
                    'resources' => $user->hasAnyRole(['admin', 'editor'])
                ],
                'is_admin' => $user->isAdmin()
            ]);

        return $next($request);
    }
}
