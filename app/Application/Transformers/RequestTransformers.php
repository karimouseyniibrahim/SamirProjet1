<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class RequestTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"artisan_id" => $modelOrCollection->artisan_id,
			"section_id" => $modelOrCollection->section_id,
			"local_id" => $modelOrCollection->local_id,
			"status" => $modelOrCollection->status,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"artisan_id" => $modelOrCollection->artisan_id,
			"section_id" => $modelOrCollection->section_id,
			"local_id" => $modelOrCollection->local_id,
			"status" => $modelOrCollection->status,

        ];
    }
    public function transformModelFr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"artisan_id" => $modelOrCollection->artisan_id,
			"section_id" => $modelOrCollection->section_id,
			"local_id" => $modelOrCollection->local_id,
			"status" => $modelOrCollection->status,

        ];
    }
}