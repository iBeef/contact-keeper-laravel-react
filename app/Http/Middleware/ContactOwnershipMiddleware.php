<?php

namespace App\Http\Middleware;

use Closure;

class ContactOwnershipMiddleware
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
        var_dump($request->user->contacts()->where('user_id', $request->route('id')));
        // var_dump($request->route('id'));
        die();
        // return $next($request);
    }
}
