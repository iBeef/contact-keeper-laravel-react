<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use App\Exceptions\RedirectException;

use Illuminate\Http\Request;

// class AddContactRequest extends MiddlewareFormRequest
class UpdateContactRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'email',
            'phone' => 'nullable',
            'type' => 'nullable'
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
            'email.*' => "Please use a valid email",
            'phone.*' => "Please use a valid phone number",
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
