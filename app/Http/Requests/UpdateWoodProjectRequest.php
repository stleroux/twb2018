<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateWoodProjectRequest extends Request
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
			'name'			=> 'required',
			'description'	=> 'required',
			'category_id'	=> 'required',
			'main_image'	=> 'sometimes|image|max:1999'
		];
	}

	public function messages()
	{
		return [
			'name.required'			=> 'Required',
			'description.required'	=> 'Required',
			'category_id.required'	=> 'Required',
			'main_image.required'	=> 'Required',
			'main_image.image'		=> 'Must be an image',
			'main_image.max'			=> 'Cannot be larger than 2MB'
		];
	}
}