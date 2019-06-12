<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Colis;
use App\Application\Transformers\ColisTransformers;
use App\Application\Requests\Website\Colis\ApiAddRequestColis;
use App\Application\Requests\Website\Colis\ApiUpdateRequestColis;

class ColisApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Colis $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestColis $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestColis $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(ColisTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(ColisTransformers::transform($data) + $paginate), $status_code);
    }

}
