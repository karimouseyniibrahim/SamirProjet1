<?php

namespace App\Application\Requests\Website\Colis;


class ApiAddRequestColis
{
    public function rules()
    {
        return [
            "colis_id" => "requiredclient|id",
			"volume" => "required",
			
        ];
    }
}
