<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role_names): Response
    {
        //$role_names = array_slice(func_get_args(), 2);
        $user = Auth::user();
        if ($user->hasRoles($role_names)) {
            return $next($request);
        }

        return to_route('home');
    }
}
