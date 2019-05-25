<?php

namespace App\Application\Requests\Website\Medias;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestMedias
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "name" => "requireddescription.*",
			"type" => "required",
			
        ];
    }
}
