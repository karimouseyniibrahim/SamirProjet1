<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\CommandeProduit;
use App\Application\Transformers\CommandeProduitTransformers;
use App\Application\Requests\Website\CommandeProduit\ApiAddRequestCommandeProduit;
use App\Application\Requests\Website\CommandeProduit\ApiUpdateRequestCommandeProduit;

class CommandeProduitApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(CommandeProduit $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestCommandeProduit $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestCommandeProduit $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(CommandeProduitTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(CommandeProduitTransformers::transform($data) + $paginate), $status_code);
    }

}
