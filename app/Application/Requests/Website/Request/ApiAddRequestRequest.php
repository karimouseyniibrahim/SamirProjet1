<?php

namespace App\Application\Requests\Website\Request;


class ApiAddRequestRequest
{
    public function rules()
    {
        return [
            "artisan_id" => "requiredsection|id",
			"status" => "nullable",
			
        ];
    }
}
