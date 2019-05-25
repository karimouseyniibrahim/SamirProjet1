<?php

namespace App\Application\Requests\Website\Request;

use Illuminate\Support\Facades\Route;

class ApiUpdateRequestRequest
{
    public function rules()
    {
        $id = Route::input('id');
        return [
            "artisan_id" => "requiredsection|id",
			"status" => "nullable",
			
        ];
    }
}
