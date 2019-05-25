<?php

namespace App\Application\Requests\Admin\Local;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UpdateRequestLocal extends FormRequest
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
        $id = Route::input('id');
        return [
            "name.*" => "required",
			"description.*" => "nullable",
			"image" => "image",
			"price" => "required",
			"area" => "required",
			"site_id" => "",
			
        ];
    }
}
