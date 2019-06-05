<?php

namespace App\Application\Requests\Website\Artisan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UpdateRequestArtisan extends FormRequest
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
            "numero_artisan" => "required",
			"name.*" => "required",
			"email" => "nullable|email",
			"telephone" => "required",
			"address" => "nullable",
			
        ];
    }
}