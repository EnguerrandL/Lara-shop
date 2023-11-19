<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if isConnected 
        if (Auth::check()) {

        //    Chef if isAdmin
            if (Auth::user()->isAdmin) {
                return $next($request);
            }
        }

        
        return redirect()->route('shop.index')->with(['message' => 'Vous n\'ètes pas autoritsé', 'class' => 'danger' ]);
    }
}
