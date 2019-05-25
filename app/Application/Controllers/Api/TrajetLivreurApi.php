<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\TrajetLivreur;
use App\Application\Transformers\TrajetLivreurTransformers;
use App\Application\Requests\Website\TrajetLivreur\ApiAddRequestTrajetLivreur;
use App\Application\Requests\Website\TrajetLivreur\ApiUpdateRequestTrajetLivreur;

class TrajetLivreurApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(TrajetLivreur $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestTrajetLivreur $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestTrajetLivreur $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(TrajetLivreurTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(TrajetLivreurTransformers::transform($data) + $paginate), $status_code);
    }

}
