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
            'name' => 'nullable',
            'email' => 'email|nullable',
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
            'email.*' => "Please add a valid email",
            'phone.*' => "Please add a valid phone number",
            'name.*' => "Please add a name",
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
