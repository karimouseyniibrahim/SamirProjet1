<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Formation;
use App\Application\Transformers\FormationTransformers;
use App\Application\Requests\Website\Formation\ApiAddRequestFormation;
use App\Application\Requests\Website\Formation\ApiUpdateRequestFormation;

class FormationApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Formation $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestFormation $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestFormation $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(FormationTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(FormationTransformers::transform($data) + $paginate), $status_code);
    }

}
