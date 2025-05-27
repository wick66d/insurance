<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if(!$request->user()){
            return redirect()->route('login');
        }

        if($role === 'admin' && !$request->user()->isAdmin()){
            return redirect()->route('home')
                ->with('error', 'You do not have permission to access this page.');
        }

        if ($role === 'regular' && !($request->user()->isRegular() || $request->user()->isAdmin())) {
            return redirect()->route('home')
                ->with('error', 'You do not have permission to access this page.');
        }

        return $next($request);
    }
}
