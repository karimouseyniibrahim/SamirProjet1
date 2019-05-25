<?php

namespace App\Application\Requests\Website\Produits;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestProduits
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "Libeller" => "requireddescription.*",
			"prix" => "required",
			
        ];
    }
}
