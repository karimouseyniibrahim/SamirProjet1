<?php

namespace App\Application\Requests\Admin\Trajet;

use Illuminate\Foundation\Http\FormRequest;

class AddRequestTrajet extends FormRequest
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
            "trajetname.*" => "",
			
        ];
    }
}
