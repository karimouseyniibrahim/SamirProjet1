<?php

namespace App\Application\Requests\Website\Colis;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestColis
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "colis_id" => "requiredclient|id",
			"volume" => "required",
			
        ];
    }
}
