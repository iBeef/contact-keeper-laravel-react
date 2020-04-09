<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

abstract class MiddlewareFormRequest extends FormRequest
{
    public function all()
    {
        $this->merge(MiddlewareFormRequest::all());

        return parent::all();
    }
}
