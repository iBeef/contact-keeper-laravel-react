<?php

namespace App\Services;

use App\Exceptions\RedirectException;
use JWTAuth;

class LoginService {

    public function login($credentials)
    {   
        if(!$token = JWTAuth::attempt($credentials)) {
            $response = response()
                ->json(['msg' => "Invalid credentials"], 400);
            throw (new RedirectException)->setResponse($response);
        }
        return $token;
    }
}