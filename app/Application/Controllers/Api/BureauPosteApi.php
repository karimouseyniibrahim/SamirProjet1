<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\BureauPoste;
use App\Application\Transformers\BureauPosteTransformers;
use App\Application\Requests\Website\BureauPoste\ApiAddRequestBureauPoste;
use App\Application\Requests\Website\BureauPoste\ApiUpdateRequestBureauPoste;

class BureauPosteApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(BureauPoste $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestBureauPoste $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestBureauPoste $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(BureauPosteTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(BureauPosteTransformers::transform($data) + $paginate), $status_code);
    }

}
