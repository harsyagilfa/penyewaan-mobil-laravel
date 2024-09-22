<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotAuth
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
        if (! $request->expectsJson()) {
            // Jika URL mengandung 'admin/' dan pengguna belum terautentikasi sebagai admin
            if ($request->is('admin/*') && !Auth::guard('admin')->check()) {
                return redirect()->route('admin.login'); // Arahkan ke login admin
            }

            // Jika URL mengandung 'customer/' dan pengguna belum terautentikasi sebagai customer
            if ($request->is('customer/*') && !Auth::guard('customer')->check()) {
                return redirect()->route('customer.login'); // Arahkan ke login customer
            }
        }
        return $next($request);
    }
}
