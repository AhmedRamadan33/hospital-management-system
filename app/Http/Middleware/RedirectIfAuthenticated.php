<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

            if (Auth::guard('web')->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
            elseif (Auth::guard('admin')->check()){
                return redirect(RouteServiceProvider::ADMIN);
            }
            elseif (Auth::guard('patient')->check()){
                return redirect(RouteServiceProvider::PATIENT);
            }
            elseif (Auth::guard('doctor')->check()){
                return redirect(RouteServiceProvider::DOCTOR);
            }
            elseif (Auth::guard('rayEmployees')->check()){
                return redirect(RouteServiceProvider::RAYEMPLOYEES);
            }
            elseif (Auth::guard('labEmployees')->check()){
                return redirect(RouteServiceProvider::LABEMPLOYEES);
            }

        return $next($request);
    }
}
