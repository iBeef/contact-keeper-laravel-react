<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\ValidationTrait;
// use App\User;

class UserController extends Controller
{

    use ValidationTrait;

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
        $validator = $this->apiValidator(
            $request->all(),
            $rules,
            $customMessages
        );

        return response()
            ->json([
                'success' => true,
                'message' => "Validation passed"
            ], 201);
    }
}
