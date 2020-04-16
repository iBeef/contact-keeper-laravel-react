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
        $contacts = 
        $request->user->contacts()->where('id', $request->route('id'))->first());
        // var_dump($request->route('id'));
        die();
        // return $next($request);
    }
}
