<?php

namespace App\Application\Requests\Website\TrajetLivreur;


class ApiAddRequestTrajetLivreur
{
    public function rules()
    {
        return [
            "user_id" => "",
			"zoneactivite_id" => "",
			
        ];
    }
}
