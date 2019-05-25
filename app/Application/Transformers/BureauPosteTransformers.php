<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class BureauPosteTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "en")},
			"adresse" => $modelOrCollection->adresse,
			"tel" => $modelOrCollection->tel,
			"email" => $modelOrCollection->email,
			"image" => $modelOrCollection->image,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "ar")},
			"adresse" => $modelOrCollection->adresse,
			"tel" => $modelOrCollection->tel,
			"email" => $modelOrCollection->email,
			"image" => $modelOrCollection->image,

        ];
    }

}