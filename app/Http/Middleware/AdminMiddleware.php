<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();        
        if($user){
            $user = Auth::user()->roles;
            if(!$user){
                return redirect('/');
            } else {
               return $next($request);
            }
        } else {
            return redirect(403);
        }

        return redirect(403);


    }
}