<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreatePermissionRequest extends Request
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
            'name'          => 'required|unique:permissions,name',
            'display_name'  => 'required',
            'description'   => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Required',
            'name.unique'           => 'The name must be unique',
            'display_name.required' => 'Required',
            'description.required'  => 'Required',
        ];
    }
}