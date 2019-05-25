<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Request;
use App\Application\Transformers\RequestTransformers;
use App\Application\Requests\Website\Request\ApiAddRequestRequest;
use App\Application\Requests\Website\Request\ApiUpdateRequestRequest;

class RequestApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Request $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestRequest $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestRequest $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(RequestTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(RequestTransformers::transform($data) + $paginate), $status_code);
    }

}
