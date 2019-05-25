<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class SiteTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "fr")},
			"description" => $modelOrCollection->{lang("description" , "fr")},
			"image" => $modelOrCollection->image,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "ar")},
			"description" => $modelOrCollection->{lang("description" , "ar")},
			"image" => $modelOrCollection->image,

        ];
    }
    public function transformModelFr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "fr")},
			"description" => $modelOrCollection->{lang("description" , "fr")},
			"image" => $modelOrCollection->image,

        ];
    }
    public function transformModelEn(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
            "name" => $modelOrCollection->{lang("name" , "en")},
            "description" => $modelOrCollection->{lang("description" , "en")},
            "image" => $modelOrCollection->image,

        ];
    }
}