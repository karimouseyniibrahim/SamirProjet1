<?php

namespace App\Application\Requests\Website\CommandeProduit;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestCommandeProduit
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "modeEnvoi" => "devis",
			"datedebutacheminement" => "",
			
        ];
    }
}
