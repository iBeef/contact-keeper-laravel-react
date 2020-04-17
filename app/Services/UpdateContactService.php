<?php

namespace App\Services;

use App\Contact;
use App\Exceptions\RedirectException;

class UpdateContactService {

    public function updateContact(\Illuminate\Http\Request $request, $id)
    {   
        $filtered = array_filter($request->validated(), [$this, 'filterNull']);
        $user = $request->user;
        $contact = $user->contacts()->where('id', $id)->first();
        try {
            $contact->update($filtered);
            return $contact;
        } catch(\Exception $e) {
            $response = response()
                ->json(['msg' => "Server error"], 500);
            throw (new RedirectException)->setResponse($response);
        }
    }

    /**
     * Filter out any null values from an array.
     *
     * @param mixed $var
     * @return bool
     */
    private function filterNull($var) {
        return ($var !== null); 
    }
}