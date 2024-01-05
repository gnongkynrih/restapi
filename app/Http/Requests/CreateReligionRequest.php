<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class CreateReligionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules():array
    {
        return [
            'name' => 'required|string|max:3',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Name is required',
            'name.max' => 'Name should be maximum 3 characters',
        ];
    }
}
