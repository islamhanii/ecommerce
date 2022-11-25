<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\UserRole;
use Closure;
use Illuminate\Http\Request;

class IsUser
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
        $roleId = Role::select('id')->where('name', 'user')->first()->id;
        $user = UserRole::where([['user_id', auth()->user()->id], ['role_id', $roleId]])->exists();
        if(!$user) {
            UserRole::create([
                'user_id' => auth()->user()->id,
                'role_id' => $roleId
            ]);
        }

        return $next($request);
    }
}
