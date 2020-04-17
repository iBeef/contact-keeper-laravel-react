<?php

namespace App\Http\Middleware;

use Closure;

use App\Contact;
use App\Exceptions\RedirectException;

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
        $contact = Contact::where('id', $request->route('id'))->first();
        if($contact and $contact->user_id !== $request->user->id) {
            $response = response()
                ->json(['msg' => "Not authorised"], 401);
            throw (new RedirectException)->setResponse($response);
        } else if(!$contact) {
            $response = response()
                ->json(['msg' => "Contact not found"], 404);
            throw (new RedirectException)->setResponse($response);
        }
        return $next($request);
    }
}
