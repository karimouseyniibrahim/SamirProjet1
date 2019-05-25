<?php

namespace App\Application\Controllers\Api;


use App\Application\Controllers\Controller;
use App\Application\Model\News;
use App\Application\Transformers\NewsTransformers;
use App\Application\Requests\Website\News\ApiAddRequestNews;
use App\Application\Requests\Website\News\ApiUpdateRequestNews;

class NewsApi extends Controller
{
    use ApiTrait;
    protected $model;

    public function __construct(News $model)
    {
        $this->model = $model;
        /// send header Authorization Bearer token
        /// $this->middleware('authApi')->only();
    }

    public function add(ApiAddRequestNews $validation){
         return $this->addItem($validation);
    }

    public function update($id , ApiUpdateRequestNews $validation){
        return $this->updateItem($id , $validation);
    }

    protected function checkLanguageBeforeReturn($data , $status_code = 200, $paginate = [])
    {
       if (request()->has('lang') && request()->get('lang') == 'ar') {
            return response(apiReturn(NewsTransformers::transformAr($data) + $paginate), $status_code);
        }
        return response(apiReturn(NewsTransformers::transform($data) + $paginate), $status_code);
    }

}
