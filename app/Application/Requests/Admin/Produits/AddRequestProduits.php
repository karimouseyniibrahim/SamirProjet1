<?php

namespace App\Application\Requests\Admin\Produits;

use Illuminate\Foundation\Http\FormRequest;

class AddRequestProduits extends FormRequest
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
            "Libeller.*" => "required",
			"description.*" => "nullable",
			"prix" => "required",
			
        ];
    }
}
