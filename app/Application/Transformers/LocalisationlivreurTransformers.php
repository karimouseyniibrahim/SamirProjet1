<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class LocalisationlivreurTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"user_id" => $modelOrCollection->user_id,
			"trajetlivreur_id" => $modelOrCollection->trajetlivreur_id,
			"status" => $modelOrCollection->status,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"user_id" => $modelOrCollection->user_id,
			"trajetlivreur_id" => $modelOrCollection->trajetlivreur_id,
			"status" => $modelOrCollection->status,

        ];
    }

}