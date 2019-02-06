<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateRecipeRequest extends Request
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
            'title'			=> 'required|regex:/^[\pL\s\-]+$/u|min:5|max:255|',
            'ingredients'	=> 'required',
            'methodology'	=> 'required',
            'image'			=> 'image',
            'category_id'	=> 'required|integer',
            'servings'		=> 'required|integer',
            'prep_time'		=> 'required|integer',
            'cook_time'		=> 'required|integer',
            'source'		=> 'sometimes',
            'author_notes'	=> 'sometimes',
            'public_notes'	=> 'sometimes',
        ];
    }

    public function messages()
    {
        return [
            'title.required'        => 'Enter the name of the recipe',
            'title.min'             => 'The title must be at least 5 characters',
            'title.max'             => 'The title must be less than 255 characters',
            'title.regex'           => 'Title can only contain alpha characters (Aa - Zz)',
            'category_id.required'  => 'The category is required',
            'ingredients.required'  => 'List the recipe ingredients',
            'methodology.required'  => 'Please enter the recipe\'s methodology',
            'servings.required'     => 'Required',
            'prep_time.required'    => 'Required',
            'cook_time.required'    => 'Required',
        ];
    }
}