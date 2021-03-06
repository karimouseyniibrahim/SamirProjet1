<?php

namespace App\Application\Requests\Admin\Colis;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class UpdateRequestColis extends FormRequest
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
            "colis_id" => "required",
			"client_id" => "required",
			"poids" => "required",
			"volume" => "required",
			
        ];
    }
}
