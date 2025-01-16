<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  mixed $role
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::check()) {
            $userRole = Auth::user()->role;

            // Cek apakah peran pengguna cocok
            if ((is_array($role) && in_array($userRole, $role)) || (is_string($role) && $userRole === $role)) {
                return $next($request); // Lanjutkan ke halaman tujuan jika cocok
            }

            // Jika role tidak cocok, arahkan ke halaman error atau default
            return redirect('/forbidden'); // Halaman akses ditolak
        }

        // Jika tidak login, arahkan ke halaman login
        return redirect('/login');
    }
}
