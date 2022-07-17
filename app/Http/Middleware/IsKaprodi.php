<?php

namespace App\Http\Middleware;

use App\Models\RoleAdvance;
use App\Models\Dosen;
use Closure;
use Illuminate\Http\Request;

class IsKaprodi
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
        // $dosen = Dosen::where('user_id', auth()->user()->id)->first();
        // if (RoleAdvance::where(['dosen_id' => $dosen->id, 'role_advance_id' => 3])->first() == null) {
        //     // abort(403);
        //     return route('login');
        // }
        // if ($dosen->is_kaprodi == 1) {
        if (!auth()->check()) {
            // abort(403);
            return redirect()->route('login');
        }
        if (!auth()->user()->dosen->is_kaprodi) {
            // abort(403);
            return redirect()->route('login');
        }
        return $next($request);
    }
}
