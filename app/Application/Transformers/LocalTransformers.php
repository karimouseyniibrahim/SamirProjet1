<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class LocalTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "en")},
			"description" => $modelOrCollection->{lang("description" , "en")},
			"image" => $modelOrCollection->image,
			"price" => $modelOrCollection->price,
			"area" => $modelOrCollection->area,
			"section_id" => $modelOrCollection->section_id,
        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "ar")},
			"description" => $modelOrCollection->{lang("description" , "ar")},
			"image" => $modelOrCollection->image,
			"price" => $modelOrCollection->price,
			"area" => $modelOrCollection->area,
			"section_id" => $modelOrCollection->section_id,
        ];
    }
    public function transformModelFr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "fr")},
			"description" => $modelOrCollection->{lang("description" , "fr")},
			"image" => $modelOrCollection->image,
			"price" => $modelOrCollection->price,
			"area" => $modelOrCollection->area,
			"section_id" => $modelOrCollection->section_id,
        ];
    }
}