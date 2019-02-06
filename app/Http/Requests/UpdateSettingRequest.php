<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateSettingRequest extends Request
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
            //'name'          => 'required|unique:settings,name|max:255',
            'displayName'   => 'required|max:255',
            'value'         => 'required|max:255',
            'description'   => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            //'name.required'            => 'Required',
            //'name.max'                 => 'Maximum 255 characters',
            'displayName.required'     => 'Required',
            'displayName.max'          => 'Maximum 255 characters',
            'value.required'           => 'Required',
            'value.max'                => 'Maximum 255 characters',
            'description.required'     => 'Required',
            'description.max'          => 'Maximum 255 characters'
        ];
    }
}