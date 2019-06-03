<?php

namespace App\Application\Transformers;

use Illuminate\Database\Eloquent\Model;

class CommandeProduitTransformers extends AbstractTransformer
{

    public function transformModel(Model $modelOrCollection)
    {
        return [
            "id" => $modelOrCollection->id,
			"modeEnvoi" => $modelOrCollection->modeEnvoi,
			"devis" => $modelOrCollection->devis,
			"typecommande" => $modelOrCollection->typecommande,
			"fraistransport" => $modelOrCollection->fraistransport,
			"paye" => $modelOrCollection->paye,
			"dateacheminer" => $modelOrCollection->dateacheminer,
			"delaislivraison" => $modelOrCollection->delaislivraison,
			"datedebutacheminement" => $modelOrCollection->datedebutacheminement,

        ];
    }

    public function transformModelAr(Model $modelOrCollection)
    {
        return [
           "id" => $modelOrCollection->id,
			"modeEnvoi" => $modelOrCollection->modeEnvoi,
			"devis" => $modelOrCollection->devis,
			"typecommande" => $modelOrCollection->typecommande,
			"fraistransport" => $modelOrCollection->fraistransport,
			"paye" => $modelOrCollection->paye,
			"dateacheminer" => $modelOrCollection->dateacheminer,
			"delaislivraison" => $modelOrCollection->delaislivraison,
			"datedebutacheminement" => $modelOrCollection->datedebutacheminement,

        ];
    }

}