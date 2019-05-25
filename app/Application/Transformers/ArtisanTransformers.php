<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class ArtisanTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"numero_artisan" => $modelOrCollection->numero_artisan,
			"name" => $modelOrCollection->{lang("name" , "en")},
			"email" => $modelOrCollection->email,
			"telephone" => $modelOrCollection->telephone,
			"address" => $modelOrCollection->address,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"numero_artisan" => $modelOrCollection->numero_artisan,
			"name" => $modelOrCollection->{lang("name" , "ar")},
			"email" => $modelOrCollection->email,
			"telephone" => $modelOrCollection->telephone,
			"address" => $modelOrCollection->address,

        ];
    }
    public function transformModelFr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"numero_artisan" => $modelOrCollection->numero_artisan,
			"name" => $modelOrCollection->{lang("name" , "fr")},
			"email" => $modelOrCollection->email,
			"telephone" => $modelOrCollection->telephone,
			"address" => $modelOrCollection->address,

        ];
    }

}