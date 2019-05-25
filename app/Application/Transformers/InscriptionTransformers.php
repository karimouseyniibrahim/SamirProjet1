<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class InscriptionTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"numero_artisan" => $modelOrCollection->numero_artisan,
			"name" => $modelOrCollection->name,
			"email" => $modelOrCollection->email,
			"adresse" => $modelOrCollection->adresse,
			"telephone" => $modelOrCollection->telephone,
			"status" => $modelOrCollection->status,
			"formation_id" => $modelOrCollection->formation_id,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"numero_artisan" => $modelOrCollection->numero_artisan,
			"name" => $modelOrCollection->name,
			"email" => $modelOrCollection->email,
			"adresse" => $modelOrCollection->adresse,
			"telephone" => $modelOrCollection->telephone,
			"status" => $modelOrCollection->status,
			"formation_id" => $modelOrCollection->formation_id,

        ];
    }
	public function transformModelFr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"numero_artisan" => $modelOrCollection->numero_artisan,
			"name" => $modelOrCollection->name,
			"email" => $modelOrCollection->email,
			"adresse" => $modelOrCollection->adresse,
			"telephone" => $modelOrCollection->telephone,
			"status" => $modelOrCollection->status,
			"formation_id" => $modelOrCollection->formation_id,

        ];
    }
}