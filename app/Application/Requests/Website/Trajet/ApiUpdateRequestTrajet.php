<?php

namespace App\Application\Requests\Website\Trajet;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestTrajet
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "trajetname" => "",
			
        ];
    }
}
