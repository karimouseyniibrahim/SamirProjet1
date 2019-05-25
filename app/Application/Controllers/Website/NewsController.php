<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use App\Application\Model\News;
use App\Application\Requests\Website\News\AddRequestNews;
use App\Application\Requests\Website\News\UpdateRequestNews;

class NewsController extends AbstractController
{

    public function __construct(News $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        $items = $this->model;

//        if (request()->has('from') && request()->get('from') != '') {
//            $items = $items->whereDate('created_at', '>=', request()->get('from'));
//        }
//
//        if (request()->has('to') && request()->get('to') != '') {
//            $items = $items->whereDate('created_at', '<=', request()->get('to'));
//        }
//
//        if (request()->has("title") && request()->get("title") != "") {
//            $items = $items->where("title", "like", "%" . request()->get("title") . "%");
//        }
//
//        if (request()->has("description") && request()->get("description") != "") {
//            $items = $items->where("description", "like", "%" . request()->get("description") . "%");
//        }

        $items = $items->paginate(env('PAGINATE'));
        $url = setting("news");
        $imag = [];
        if ($url != null) {
            $imag = ["imag" => url('/' . env('UPLOAD_PATH') . '/' . $url)];
        }

        return view('website.news.index', compact('items', 'imag'));
    }

    public function show($id = null)
    {
        return $this->createOrEdit('website.news.edit', $id);
    }

    public function store(AddRequestNews $request)
    {
        $item = $this->storeOrUpdate($request, null, true);
        return redirect('news');
    }

    public function update($id, UpdateRequestNews $request)
    {
        $item = $this->storeOrUpdate($request, $id, true);
        return redirect()->back();

    }

    public function getById($id)
    {
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('website.news.show', $id, ['fields' => $fields]);
    }

    public function getBySlug($slug)
    {
        $news = $this->model->all();
        $fields = $news->where('slug', str_slug($slug))->first();
        if (is_null($fields)) {
            return view('errors.404');
        }

        return $this->createOrEdit('website.news.show', $fields->id, ['fields' => $fields]);
    }

    public function destroy($id)
    {
        return $this->deleteItem($id, 'news')->with('sucess', 'Done Delete News From system');
    }

}
