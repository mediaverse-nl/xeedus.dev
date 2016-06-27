<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class notBlocked
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
//        if ( Auth::check() && Auth::user()->isBlocked() )
//        {
//            return true;            // Do what you need here
//            // the User is blocked!
//           //return redirect()->route('page_contact');
//        }

        return $next($request);
    }
}
