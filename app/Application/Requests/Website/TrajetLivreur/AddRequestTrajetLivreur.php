<?php

namespace App\Application\Requests\Website\TrajetLivreur;

use Illuminate\Foundation\Http\FormRequest;

class AddRequestTrajetLivreur extends FormRequest
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
            "user_id" => "",
			"zoneactivite_id" => "",
			
        ];
    }
}
