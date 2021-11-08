<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsQAC
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
        if (auth()->user()->user_role_id == 3)
        {
            return $next($request);
        }
        return redirect('home')->with('error', "Youre not QAC");
    }
}
