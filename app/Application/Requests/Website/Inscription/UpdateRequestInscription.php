<?php

namespace App\Application\Requests\Website\Inscription;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UpdateRequestInscription extends FormRequest
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
            "numero_artisan" => "nullable",
			"name" => "required",
			"email" => "nullable|email",
			"adresse" => "nullable",
			"telephone" => "nullable",
			"status" => "nullable",
			"formation_id" => "required",
			
        ];
    }
}
