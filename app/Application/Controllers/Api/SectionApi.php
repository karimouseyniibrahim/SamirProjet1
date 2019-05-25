<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\Site;
use App\Application\Transformers\SiteTransformers;
use App\Application\Requests\Website\Section\ApiAddRequestSection;
use App\Application\Requests\Website\Section\ApiUpdateRequestSection;

class SectionApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(Site $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestSection $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestSection $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(SiteTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(SiteTransformers::transform($data) + $paginate), $status_code);
    }

}
