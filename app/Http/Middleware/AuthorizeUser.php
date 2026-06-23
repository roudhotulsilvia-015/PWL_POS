<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role = ''): Response
{
    $user = $request->user(); // ambil data user yang sedang login [cite: 812, 813]

    if ($user->hasRole($role)) { // cek apakah punya role yang diinginkan [cite: 817, 818]
        return $next($request); // jika punya, lanjut akses [cite: 820]
    }

    // jika tidak punya role, munculkan error 403 (Forbidden) [cite: 824, 826]
    abort(403, 'Forbidden. Kamu tidak punya akses ke halaman ini');
}
}
