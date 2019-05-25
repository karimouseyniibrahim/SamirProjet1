<?php

namespace App\Application\Requests\Website\Section;


class ApiAddRequestSection
{
    public function rules()
    {
        return [
            "name" => "requireddescription.*",
			"image" => "image",
			
        ];
    }
}
