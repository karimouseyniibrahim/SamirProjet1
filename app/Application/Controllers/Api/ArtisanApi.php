<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Artisan;
use App\Application\Transformers\ArtisanTransformers;
use App\Application\Requests\Website\Artisan\ApiAddRequestArtisan;
use App\Application\Requests\Website\Artisan\ApiUpdateRequestArtisan;

class ArtisanApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Artisan $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestArtisan $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestArtisan $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(ArtisanTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(ArtisanTransformers::transform($data) + $paginate), $status_code);
    }

}
