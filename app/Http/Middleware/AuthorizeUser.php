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
    * @param \Illuminate\Http\Request $request
    * @param \Closure $next
    * @param string ...$roles
    * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        // jika tidak ada user yang login, langsung abort
        if (!$user) {
            abort(403, 'Forbidden. Kamu tidak punya akses ke halaman ini');
        }

        // gunakan getRoleCode() sesuai implementasi di UserModel
        $user_role = method_exists($user, 'getRoleCode') ? $user->getRoleCode() : null;

        if ($user_role !== null && in_array($user_role, $roles)) { // cek apakah level_kode user ada di dalam array roles
            return $next($request); // jika ada, maka lanjutkan request
        }

        // jika tidak punya role, maka tampilkan error 403
        abort(403, 'Forbidden. Kamu tidak punya akses ke halaman ini');
    }
}
