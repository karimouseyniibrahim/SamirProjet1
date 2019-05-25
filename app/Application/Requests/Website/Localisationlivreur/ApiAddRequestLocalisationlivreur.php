<?php

namespace App\Application\Requests\Website\Localisationlivreur;


class ApiAddRequestLocalisationlivreur
{
    public function rules()
    {
        return [
            "user_id" => "trajetlivreur|id",
			"status" => "",
			
        ];
    }
}
