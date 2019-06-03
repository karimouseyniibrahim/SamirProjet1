<?php

namespace App\Application\Requests\Admin\CommandeProduit;

use Illuminate\Foundation\Http\FormRequest;

class AddRequestCommandeProduit extends FormRequest
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
            "modeEnvoi" => "",
			"devis" => "",
			"typecommande" => "",
			"fraistransport" => "",
			"paye" => "",
			"dateacheminer" => "",
			"delaislivraison" => "",
			"datedebutacheminement" => "",
			
        ];
    }
}
