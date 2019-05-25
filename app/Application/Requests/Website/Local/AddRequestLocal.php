<?php

namespace App\Application\Requests\Website\Local;

use Illuminate\Foundation\Http\FormRequest;

class AddRequestLocal extends FormRequest
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
        return [
            "name.*" => "required",
			"description.*" => "nullable",
			"image" => "image",
			"price" => "required",
			"area" => "required",
			"section_id" => "",
			
        ];
    }
}
