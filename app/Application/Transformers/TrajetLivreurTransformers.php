<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class TrajetLivreurTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"user_id" => $modelOrCollection->user_id,
			"zoneactivite_id" => $modelOrCollection->zoneactivite_id,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"user_id" => $modelOrCollection->user_id,
			"zoneactivite_id" => $modelOrCollection->zoneactivite_id,

        ];
    }

}