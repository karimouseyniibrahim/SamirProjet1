<?php

namespace App\Application\Requests\Website\Section;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestSection
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "name" => "requireddescription.*",
			"image" => "image",
			
        ];
    }
}
