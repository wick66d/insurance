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
        if(!$request->user() || $request->user()->role !== $role){
            if($request->user() && $request->user()->role ===  'viewer' && $role === 'admin'){
                return redirect()->route('cars.index')
                    ->with('error', 'You do not have permission to perform this action.');
            }

            return redirect()->route('login');
        }
        return $next($request);
    }
}
