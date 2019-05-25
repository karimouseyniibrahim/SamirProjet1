<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Local;
use App\Application\Transformers\LocalTransformers;
use App\Application\Requests\Website\Local\ApiAddRequestLocal;
use App\Application\Requests\Website\Local\ApiUpdateRequestLocal;

class LocalApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Local $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestLocal $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestLocal $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(LocalTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(LocalTransformers::transform($data) + $paginate), $status_code);
    }

}
