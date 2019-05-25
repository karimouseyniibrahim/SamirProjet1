<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class ZoneActiviteTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"nameZone" => $modelOrCollection->nameZone,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"nameZone" => $modelOrCollection->nameZone,

        ];
    }

}