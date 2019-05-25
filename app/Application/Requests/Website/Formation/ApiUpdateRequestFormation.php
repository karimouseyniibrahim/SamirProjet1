<?php

namespace App\Application\Requests\Website\Formation;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestFormation
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "libelle" => "required",
			"description" => "nullable",
			
        ];
    }
}
