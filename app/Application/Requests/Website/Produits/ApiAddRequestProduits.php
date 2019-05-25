<?php

namespace App\Application\Requests\Website\Produits;


class ApiAddRequestProduits
{
    public function rules()
    {
        return [
            "Libeller" => "requireddescription.*",
			"prix" => "required",
			
        ];
    }
}
