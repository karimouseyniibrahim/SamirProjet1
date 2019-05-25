<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Localisationlivreur;
use App\Application\Transformers\LocalisationlivreurTransformers;
use App\Application\Requests\Website\Localisationlivreur\ApiAddRequestLocalisationlivreur;
use App\Application\Requests\Website\Localisationlivreur\ApiUpdateRequestLocalisationlivreur;

class LocalisationlivreurApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Localisationlivreur $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestLocalisationlivreur $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestLocalisationlivreur $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(LocalisationlivreurTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(LocalisationlivreurTransformers::transform($data) + $paginate), $status_code);
    }

}
