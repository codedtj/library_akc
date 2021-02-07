<?php
/**
 * @author Sultonazar Mamadazizov <sultonazar.mamadazizov@mail.ru>
 */

namespace Modules\Library\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ... $roles){
        $user = Auth::user();

        if($user->isAdmin())
            return $next($request);

        if($user->hasAnyRole($roles))
            return $next($request);

        return abort(403, 'Access denied');
    }
}
