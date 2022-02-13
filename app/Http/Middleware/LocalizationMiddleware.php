<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LocalizationMiddleware
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
      // Cek apakah session 'locale' ada?
      if ($request->session()->has('locale')) {
        // Jika ada, maka set App Locale sesuai nilai yang ada di session 'locale'.
        \App::setLocale($request->session()->get('locale'));
    }
    
    // Lanjutkan request.
    return $next($request);
    }
}
