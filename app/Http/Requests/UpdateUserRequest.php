<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateUserRequest extends Request
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
            'username'              => 'required|min:3|max:50|unique:users,username,' . $this->id,
            //'first_name'          => 'required|min:2|max:255',
            //'last_name'           => 'required|min:2|max:255',
            'email'                 => 'required|email|unique:users,email,' . $this->id,
            'role_id'               => 'required'
        ];
    }

    public function messages()
    {
        return [
            'username.required'                 => 'Required',
            'username.unique'                   => 'Already taken',
            'username.min'                      => 'Minimum 3 charcters',
            'username.max'                      => 'Maximum 50 characters',
            'first_name.required'               => 'Required',
            'first_name.min'                    => 'Minimum 2 characters',
            'first_name.max'                    => 'Maximum 255 characters',
            'last_name.required'                => 'Required',
            'last_name.min'                     => 'Minimum 2 characters',
            'last_name.max'                     => 'Maximum 255 characters',
            'email.required'                    => 'Required',
            'email.email'                       => 'Must be valid email',
            'email.unique'                      => 'Already taken',
            'role_id.required'                  => 'Required'
        ];
    }
}