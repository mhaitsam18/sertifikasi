<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsMahasiswa
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
        if (!auth()->check()) {
            // abort(403);
            return redirect()->route('login');
        }
        if (auth()->user()->role_id !== IS_MAHASISWA) {
            // abort(403);
            return redirect()->route('login');
        }
        return $next($request);
    }
}
