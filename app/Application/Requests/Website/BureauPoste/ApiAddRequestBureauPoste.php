<?php

namespace App\Application\Requests\Website\BureauPoste;


class ApiAddRequestBureauPoste
{
    public function rules()
    {
        return [
            "name" => "adresse",
			"image" => "image",
			
        ];
    }
}
