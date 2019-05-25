<?php

namespace App\Application\Requests\Website\Request;

use Illuminate\Foundation\Http\FormRequest;

class AddRequestRequest extends FormRequest
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
            "artisan_id" => "required|exists:artisan,numero_artisan",
			"section_id" => "required|exists:section,id",
			"local_id" => "required|exists:local,id",
			"status" => "nullable",
			
        ];
    }
}
