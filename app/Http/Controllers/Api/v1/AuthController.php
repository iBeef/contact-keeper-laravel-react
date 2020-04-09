<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\LoginService;

class AuthController extends Controller
{
    /**
     * Initiates the class and adds the LoginService variable
     */
    public function __construct()
    {
        $this->loginService = new LoginService();
    }

    /**
     * Logs in the user
     * 
     * @param \App\Http\Requests\LoginRequest $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $token = $this->loginService->login($request->validated());
        return response()->json(compact('token'));
    }

    /**
     * Gets the users details
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return response()->json($request->user);
    }
}
