<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserRequest extends Request
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
            'username'              => 'required|unique:users,username|min:3|max:50',
            //'first_name'            => 'required|min:2|max:255',
            //'last_name'             => 'required|min:2|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|min:6|same:password_confirmation',
            'password_confirmation' => 'required|min:6|same:password',
            'role_id'               => 'required'
        ];
    }

    public function messages()
    {
        return [
            'username.required'                 => 'Required',
            'username.unique'                   => 'Already taken',
            'username.min'                      => 'Minimum 3 characters',
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
            'password.required'                 => 'Required',
            'password.min'                      => 'Minimum 6 characters',
            'password.same'                     => 'Passwords must match',
            'password_confirmation.required'    => 'Required',
            'password_confirmation.min'         => 'Minimum 6 characters',
            'password_confirmation.same'        => 'Passwords must match',
            'role_id.required'                  => 'Required'
            

        ];
    }
}