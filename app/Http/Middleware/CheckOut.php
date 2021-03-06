<?php

namespace App\Http\Middleware;

use App\Clock;
use Closure;

class CheckOut
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
        $clock = Clock::orderBy('check_in_date', 'desc')->first();
        if ($clock->check_out_date == null)
            return redirect('/atelier/clock/success');
        else
            return $next($request);
    }
}
