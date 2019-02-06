<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateItemRequest extends Request
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
            'title'         =>  'required|regex:/^[\pL\s\-]+$/u|min:5|max:255',
            'description'   =>  'required|min:5',
        ];
    }

    public function messages()
    {
        return [
            'title.required'        => 'Required',
            'title.min'             => 'Minimum 5 characters',
            'title.max'             => 'Maximum 255 characters',
            'title.regex'           => 'Title can only contain alpha characters (Aa - Zz)',
            'description.required'  => 'Required',
            'description.min'       => 'Minimum 5 characters',
        ];
    }
}
