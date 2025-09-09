<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // varidic parameter
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        if(!$request->user() || $request->user()->hasAnyRole($role))
        {
            return redirect()->to('dashboard');
        }

        Alert::error('Uppsss', 'Anda tidak memiliki akses ke halaman ini');
        return $next($request);
    }
}
