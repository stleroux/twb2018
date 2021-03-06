<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateCategoryRequest extends Request
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
            'name'      => 'required|min:3|max:255',
            'value'     => 'required_if:module_id,14',
            'module_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'            => 'Required',
            'name.min'                 => 'Minimum 3 characters',
            'name.max'                 => 'Maximum 255 characters',
            'value.required_if'        => 'Required if Module selected is Landing Pages',
            'module_id.required'       => 'Required',
        ];
    }
}