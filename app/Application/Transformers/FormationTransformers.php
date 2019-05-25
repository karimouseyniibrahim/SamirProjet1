<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class FormationTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"libelle" => $modelOrCollection->{lang("libelle" , "en")},
			"description" => $modelOrCollection->{lang("description" , "en")},

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"libelle" => $modelOrCollection->{lang("libelle" , "ar")},
			"description" => $modelOrCollection->{lang("description" , "ar")},

        ];
    }
    public function transformModelFr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"libelle" => $modelOrCollection->{lang("libelle" , "fr")},
			"description" => $modelOrCollection->{lang("description" , "fr")},

        ];
    }
}