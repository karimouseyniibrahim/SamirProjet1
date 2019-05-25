<?php

namespace App\Application\Requests\Website\Artisan;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestArtisan
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "numero_artisan" => "requiredname.*",
			"address" => "nullable",
			
        ];
    }
}
