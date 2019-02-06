<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdatePostRequest extends Request
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
            'title'         => 'required|max:255',
            'slug'          => "required|alpha-dash|min:5|max:255|unique:posts,slug," . $this->id,
            'category_id'   => 'required|integer',
            'body'          => 'required',
            'image'         => 'sometimes|image|mimes:jpeg,jpg,png,bmp,gif',
        ];
    }

    public function messages()
    {
        return [
            'title.required'        => 'Required',
            'title.max'             => 'Maximum 255 characters',
            'slug.required'         => 'Required',
            'slug.alpha_dash'       => 'Alpha characters only including the "_"',
            'slug.min'              => 'Minimum 5 characters',
            'slug.max'              => 'Maximum 255 characters',
            'slug.unique'           => 'Must be unique',
            'category_id.required'  => 'Required',
            'body.required'         => 'Required',
        ];
    }
}