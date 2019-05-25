<?php

namespace App\Application\Requests\Website\BureauPoste;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestBureauPoste
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "name" => "adresse",
			"image" => "image",
			
        ];
    }
}
