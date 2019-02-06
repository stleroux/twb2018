<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateUserPWDRequest extends Request
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
            'password'              => 'required|min:6|same:password_confirmation',
            'password_confirmation' => 'required|min:6|same:password',
        ];
    }

    public function messages()
    {
        return [
            'password.required'                 => 'Required',
            'password.min'                      => 'Minimum 6 characters',
            'password.same'                     => 'Passwords must match',
            'password_confirmation.required'    => 'Required',
            'password_confirmation.min'         => 'Minimum 6 characters',
            'password_confirmation.same'        => 'Passwords must match',
        ];
    }
}