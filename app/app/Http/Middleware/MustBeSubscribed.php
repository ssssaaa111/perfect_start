<?php

namespace App\Http\Middleware;

use Closure;

class MustBeSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $plan
     * @return mixed
     */
    public function handle($request, Closure $next, $plan = null)
    {
        if ($request->user() && $request->user()->subscribed($plan)) {
            return $next($request);
        }
        return redirect('login');
    }
}
