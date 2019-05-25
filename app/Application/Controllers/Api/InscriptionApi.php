<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Inscription;
use App\Application\Transformers\InscriptionTransformers;
use App\Application\Requests\Website\Inscription\ApiAddRequestInscription;
use App\Application\Requests\Website\Inscription\ApiUpdateRequestInscription;

class InscriptionApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Inscription $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestInscription $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestInscription $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(InscriptionTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(InscriptionTransformers::transform($data) + $paginate), $status_code);
    }

}
