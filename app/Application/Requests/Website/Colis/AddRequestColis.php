<?php

namespace App\Application\Requests\Website\Colis;

use Illuminate\Foundation\Http\FormRequest;

class AddRequestColis extends FormRequest
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
            "colis_id" => "required",
			"client_id" => "required",
			"poids" => "required",
			"volume" => "required",
			
        ];
    }
}
