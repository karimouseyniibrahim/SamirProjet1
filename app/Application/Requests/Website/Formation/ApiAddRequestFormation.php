<?php

namespace App\Application\Requests\Website\Formation;


class ApiAddRequestFormation
{
    public function rules()
    {
        return [
            "libelle" => "required",
			"description" => "nullable",
			
        ];
    }
}
