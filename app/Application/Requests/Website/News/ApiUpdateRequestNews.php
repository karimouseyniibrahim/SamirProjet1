<?php

namespace App\Application\Requests\Website\News;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestNews
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "title" => "requireddescription.*",
			"image" => "image",
			
        ];
    }
}
