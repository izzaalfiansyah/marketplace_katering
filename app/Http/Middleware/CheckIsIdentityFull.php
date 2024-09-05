<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIsIdentityFull
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::user()->province_id || !Auth::user()->regency_id || !Auth::user()->district_id) {
            return redirect('/profile')->with('warning', "Lengkapi identitasmu terlebih dahulu!");
        }

        return $next($request);
    }
}
