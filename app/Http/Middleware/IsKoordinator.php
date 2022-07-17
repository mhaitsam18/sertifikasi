<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsKoordinator
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
        if (!auth()->user()->dosen->is_koordinator) {
            // abort(403);
            return redirect()->route('login');
        }
        return $next($request);
    }
}
