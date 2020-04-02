<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6'

        ];
        $customMessages = [
            'name.*' => "Please add a name",
            'email.*' => "Please include a valid email",
            'password.*' => "Please enter a password with 6 or more characters."
        ];
        $validator = Validator::make(
            $request->all(),
            $rules, $customMessages
        );
        if(!$validator->fails()) {
            // $validated = $validator->validated();
            // $user = new User;
            // $user->name = $validated['name'];
            // $user->email = $validated['email'];
            // $user->password = $validated['password'];
            // $user->save();
            return response()
                ->json([
                    'success' => true
                ], 201);
        } else {
            return response()
            ->json([
                'errors' => $validator->errors()
            ], 400);
        }
    }
}
