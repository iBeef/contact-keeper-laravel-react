<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\RedirectException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * Anyone can access this route
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
            'email.*' => "Please include a valid email"
        ];
    }

    /**
     * Handle a failed validation attempt
     * 
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $response = response()
            ->json([
                'errors' => $validator->errors()
            ], 400);
        throw (new RedirectException)->setResponse($response);
    }
}
