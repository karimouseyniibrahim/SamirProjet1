<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class MediasTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "en")},
			"description" => $modelOrCollection->{lang("description" , "en")},
			"type" => $modelOrCollection->type,
			"files" => $modelOrCollection->files,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "ar")},
			"description" => $modelOrCollection->{lang("description" , "ar")},
            "type" => $modelOrCollection->type,
            "files" => $modelOrCollection->files,

        ];
    }
    public function transformModelFr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"name" => $modelOrCollection->{lang("name" , "fr")},
			"description" => $modelOrCollection->{lang("description" , "fr")},
            "type" => $modelOrCollection->type,
            "files" => $modelOrCollection->files,

        ];
    }
}