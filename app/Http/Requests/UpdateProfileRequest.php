<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateProfileRequest extends Request
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
            'first_name'	=> 'required|min:2|max:255',
            'last_name'     => 'required|min:2|max:255',
            'telephone'     => 'required',
            //'email'         => 'required|email|unique:users,email,' . $this->id,
            'image'			=> 'sometimes|image',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'   => 'Required',
            'first_name.min'        => 'Minimum 2 characters',
            'first_name.max'        => 'Maximum 255 characters',
            'last_name.required'    => 'Required',
            'last_name.min'         => 'Minimum 20 characters',
            'last_name.max'         => 'Maximum 255 characters',
            'telephone.required'    => 'Required',
            // 'email.required'        => 'Required',
            // 'email.email'           => 'Must be valid email',
            // 'email.unique'          => 'Already taken',
            // 'image.image'           => 'Must be an image file'
        ];
    }
}