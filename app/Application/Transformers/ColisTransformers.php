<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class ColisTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"colis_id" => $modelOrCollection->colis_id,
			"client_id" => $modelOrCollection->client_id,
			"poids" => $modelOrCollection->poids,
			"volume" => $modelOrCollection->volume,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"colis_id" => $modelOrCollection->colis_id,
			"client_id" => $modelOrCollection->client_id,
			"poids" => $modelOrCollection->poids,
			"volume" => $modelOrCollection->volume,

        ];
    }

}