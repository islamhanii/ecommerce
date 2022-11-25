<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\UserRole;
use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $roleId = Role::select('id')->where('name', 'admin')->first()->id;
        $admin = UserRole::where([['user_id', auth()->user()->id], ['role_id', $roleId]])->exists();
        if($admin) {
            return $next($request);
        }
        return abort(401);
    }
}
