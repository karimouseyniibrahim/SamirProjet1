<?php

namespace App\Application\Requests\Website\ZoneActivite;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestZoneActivite
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "nameZone" => "",
			
        ];
    }
}
