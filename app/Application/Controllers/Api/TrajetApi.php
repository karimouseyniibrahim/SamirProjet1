<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Trajet;
use App\Application\Transformers\TrajetTransformers;
use App\Application\Requests\Website\Trajet\ApiAddRequestTrajet;
use App\Application\Requests\Website\Trajet\ApiUpdateRequestTrajet;

class TrajetApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Trajet $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestTrajet $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestTrajet $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(TrajetTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(TrajetTransformers::transform($data) + $paginate), $status_code);
    }

}
