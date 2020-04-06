<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\ValidationTrait;
use App\User;
use App\Http\Requests\RegisterUser;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{

    use ValidationTrait;

    /**
     * Store a newly created user in the DB.
     *
     * @param  App\Http\Requests\RegisterUser  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterUser $request)
    {
        $validated = $request->validated();
        if(User::where('email', $validated['email'])->first()) {
            return response()
                ->json(['msg' => "User already exists"], 400);
        } else {
            $user = User::create($validated);
            $token = JWTAuth::fromUser($user);
            return response()->json(compact('token'), 201);
        }
    }
}
