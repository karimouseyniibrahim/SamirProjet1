<?php

namespace App\Application\Requests\Website\Local;


class ApiAddRequestLocal
{
    public function rules()
    {
        return [
            "name" => "requireddescription.*",
			"section_id" => "",
			
        ];
    }
}
