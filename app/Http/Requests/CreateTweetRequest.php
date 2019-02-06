<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateTweetRequest extends Request
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
            'title' => 'required|max:255',
            'body'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'         => 'Required',
            'title.max'              => 'Maximum 50 characters',
            'body.required'          => 'Required',
        ];
    }
}