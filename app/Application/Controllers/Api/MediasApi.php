<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Medias;
use App\Application\Transformers\MediasTransformers;
use App\Application\Requests\Website\Medias\ApiAddRequestMedias;
use App\Application\Requests\Website\Medias\ApiUpdateRequestMedias;

class MediasApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Medias $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestMedias $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestMedias $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(MediasTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(MediasTransformers::transform($data) + $paginate), $status_code);
    }

}
