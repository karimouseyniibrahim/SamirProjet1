<?php

namespace App\Application\Repository\Eloquent;


use App\Application\Model\Site;
use App\Application\Model\Local;
use App\Application\Repository\InterFaces\LocalInterface;


class LocalEloquent extends AbstractEloquent implements LocalInterface
{

    public function __construct(Local $local)
    {
        $this->model = $local;
    }

    public function getRequestById($id)
    {

        $sites = transformSelect(Site::pluck('name', 'id')->all());
        $locaux = [];
        if ($id != null) {
            $item = $this->model->find($id);
            $locaux = transformSelect(Local::where('site_id', $item->site_id)->pluck('name', 'id')->all());
        }

        return $data = [
            'sites' => $sites,
            'locaux' => $locaux
        ];
    }

}