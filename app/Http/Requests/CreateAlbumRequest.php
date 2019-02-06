<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateAlbumRequest extends Request
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
            'name'              =>  'required|max:255',
            'description'       =>  'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'           => 'Required',
            'name.max'                => 'Maximum 255 characters',
            'description.required'    => 'Required'
        ];
    }

}
