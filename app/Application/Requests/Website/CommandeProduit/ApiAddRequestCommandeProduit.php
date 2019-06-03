<?php

namespace App\Application\Requests\Website\CommandeProduit;


class ApiAddRequestCommandeProduit
{
    public function rules()
    {
        return [
            "modeEnvoi" => "devis",
			"datedebutacheminement" => "",
			
        ];
    }
}
