<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 只有admin或者后台用户可以登录后台
        $authUser = Auth::user();
        $isBackstage = optional(Role::find($authUser->role_id))->is_backstage;
        if ($authUser->is_admin || $isBackstage == Role::IS_BACKSTAGE_ADMIN) {
            return $next($request);
        }
        return redirect('/');
    }
}
