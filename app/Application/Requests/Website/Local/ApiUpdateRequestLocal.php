<?php

namespace App\Application\Requests\Website\Local;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestLocal
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "name" => "requireddescription.*",
			"section_id" => "",
			
        ];
    }
}
