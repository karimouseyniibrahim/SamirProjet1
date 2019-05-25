<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class TrajetTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"trajetname" => $modelOrCollection->{lang("trajetname" , "en")},

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"trajetname" => $modelOrCollection->{lang("trajetname" , "ar")},

        ];
    }

}