<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateTagRequest extends Request
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
        // https://laravel.com/docs/5.2/validation#available-validation-rules
        return [
            'name'=>'required|max:255|unique:tags,name'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Required',
            'name.max'              => 'Maximum 50 characters',
            'name.unique'           => 'The name must be unique',
        ];
    }
}