<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class ProduitsTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"Libeller" => $modelOrCollection->{lang("Libeller" , "en")},
			"description" => $modelOrCollection->{lang("description" , "en")},
			"prix" => $modelOrCollection->prix,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"Libeller" => $modelOrCollection->{lang("Libeller" , "ar")},
			"description" => $modelOrCollection->{lang("description" , "ar")},
			"prix" => $modelOrCollection->prix,

        ];
    }

}