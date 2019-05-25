<?php

namespace App\Application\Requests\Website\TrajetLivreur;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestTrajetLivreur
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "user_id" => "",
			"zoneactivite_id" => "",
			
        ];
    }
}
