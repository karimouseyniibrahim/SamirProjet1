<?php

namespace App\Application\Requests\Website\Inscription;


class ApiAddRequestInscription
{
    public function rules()
    {
        return [
            "numero_artisan" => "nullablename",
			"formation_id" => "required",
			
        ];
    }
}
