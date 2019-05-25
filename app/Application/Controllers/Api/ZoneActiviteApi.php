<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\ZoneActivite;
use App\Application\Transformers\ZoneActiviteTransformers;
use App\Application\Requests\Website\ZoneActivite\ApiAddRequestZoneActivite;
use App\Application\Requests\Website\ZoneActivite\ApiUpdateRequestZoneActivite;

class ZoneActiviteApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(ZoneActivite $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestZoneActivite $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestZoneActivite $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(ZoneActiviteTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(ZoneActiviteTransformers::transform($data) + $paginate), $status_code);
    }

}
