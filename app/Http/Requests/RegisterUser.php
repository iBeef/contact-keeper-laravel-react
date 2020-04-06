<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use App\Exceptions\RedirectException;

class RegisterUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.*' => "Please add a name",
            'email.*' => "Please include a valid email",
            'password.*' => "Please enter a password with 6 or more characters."
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()
            ->json([
                'errors' => $validator->errors()
            ], 400);
        throw (new RedirectException)->setResponse($response);
    }
}
