<?php

namespace App\Http\Middleware;

use Closure;

class ApprovedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->is_approved == "YES"){
            return $next($request);
        }

        return redirect()->back()->with('warning','You are not approved user yet. You have no access in this URL');
    }
}
