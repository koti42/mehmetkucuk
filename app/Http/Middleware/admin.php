<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!\Auth::guest() && \Auth::user()->role == 'Admin') {

            return $next($request);

        } else {
            abort(404);
        }
        return redirect('admin.login');


    }
}
