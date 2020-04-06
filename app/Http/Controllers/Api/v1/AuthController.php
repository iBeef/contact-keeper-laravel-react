<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\LoginService;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->loginService = new LoginService();
    }

    public function login(LoginRequest $request)
    {
        $token = $this->loginService->login($request->validated());
        return response()->json(compact('token'));
    }
}
