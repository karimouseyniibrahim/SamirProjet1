<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class PageTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"title" => $modelOrCollection->title_en ,
            "url" => $modelOrCollection->url_fr ,
			"body" => $modelOrCollection->body_en,
			"active" => (bool) $modelOrCollection->active

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
            "title" => $modelOrCollection->title_ar ,
            "url" => $modelOrCollection->url_fr ,
            "body" => $modelOrCollection->body_ar,
			"active" => (bool) $modelOrCollection->active

        ];
    }
    public function transformModelFr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
            "title" => $modelOrCollection->title_fr ,
            "url" => $modelOrCollection->url_fr ,
            "body" => $modelOrCollection->body_fr,
			"active" => (bool) $modelOrCollection->active

        ];
    }

}