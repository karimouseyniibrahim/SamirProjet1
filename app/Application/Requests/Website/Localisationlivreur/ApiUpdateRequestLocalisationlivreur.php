<?php

namespace App\Application\Requests\Website\Localisationlivreur;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestLocalisationlivreur
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "user_id" => "trajetlivreur|id",
			"status" => "",
			
        ];
    }
}
