<?php

namespace App\Application\Requests\Website\Medias;


class ApiAddRequestMedias
{
    public function rules()
    {
        return [
            "name" => "requireddescription.*",
			"type" => "required",
			
        ];
    }
}
