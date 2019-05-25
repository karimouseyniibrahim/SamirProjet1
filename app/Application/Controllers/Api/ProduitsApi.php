<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Produits;
use App\Application\Transformers\ProduitsTransformers;
use App\Application\Requests\Website\Produits\ApiAddRequestProduits;
use App\Application\Requests\Website\Produits\ApiUpdateRequestProduits;

class ProduitsApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Produits $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestProduits $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestProduits $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(ProduitsTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(ProduitsTransformers::transform($data) + $paginate), $status_code);
    }

}
