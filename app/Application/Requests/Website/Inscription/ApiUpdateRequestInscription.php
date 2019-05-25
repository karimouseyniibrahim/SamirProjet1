<?php

namespace App\Application\Requests\Website\Inscription;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestInscription
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "numero_artisan" => "nullablename",
			"formation_id" => "required",
			
        ];
    }
}
