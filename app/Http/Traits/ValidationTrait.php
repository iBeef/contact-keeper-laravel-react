<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Validator;
use App\Exceptions\RedirectException;

trait ValidationTrait
{
    /**
     * Validate Api requests and if reject return json
     *
     * @param  assoc  $input
     * @param  assoc  $input
     * @param  assoc  $input
     * @return \Illuminate\Http\Response|\Illuminate\Support\Facades\Validator
     */
    public function apiValidator($input, $rules, $customMessages = [])
    {
        $apiValidator = Validator::make(
            $input,
            $rules,
            $customMessages
        );
        if($apiValidator->fails()) {
            $response = response()
                ->json([
                    'errors' => $apiValidator->errors()
                ], 400);
            throw (new RedirectException)->setResponse($response);
        } else {
            return $apiValidator;
        }
    }
}
