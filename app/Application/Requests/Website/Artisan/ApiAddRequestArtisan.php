<?php

namespace App\Application\Requests\Website\Artisan;


class ApiAddRequestArtisan
{
    public function rules()
    {
        return [
            "numero_artisan" => "requiredname.*",
			"address" => "nullable",
			
        ];
    }
}
