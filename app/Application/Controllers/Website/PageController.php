<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use App\Application\Model\Page;
use App\Application\Requests\Website\Page\AddRequestPage;
use App\Application\Requests\Website\Page\UpdateRequestPage;

class PageController extends AbstractController
{
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        $items = $this->model;

        if (request()->has('from') && request()->get('from') != '') {
            $items = $items->whereDate('created_at', '>=', request()->get('from'));
        }

        if (request()->has('to') && request()->get('to') != '') {
            $items = $items->whereDate('created_at', '<=', request()->get('to'));
        }

        if (request()->has("title") && request()->get("title") != "") {
            $items = $items->where("title", "like", "%" . request()->get("title") . "%");
        }

        $items = $items->paginate(env('PAGINATE'));
        return view('website.page.index', compact('items'));
    }

    public function show($id = null)
    {
        return $this->createOrEdit('website.page.edit', $id);
    }

    public function store(AddRequestPage $request)
    {
        $item = $this->storeOrUpdate($request, null, true);
        return redirect('page');
    }

    public function update($id, UpdateRequestPage $request)
    {
        $item = $this->storeOrUpdate($request, $id, true);
        return redirect()->back();
    }

    public function getById($id)
    {
        $fields = $this->model->findOrFail($id);
        $imag = [];

        if ($fields->image != null) {
            $imag = ["imag" => url('/' . env('UPLOAD_PATH') . '/page/' . $fields->id . '/' . $fields->image)];
        }

        return view('website.page.show', compact('fields', 'imag'));
    }

    public function getBySlug($slug)
    {
        $pages = $this->model->where('active', true)->get();
        $fields = $pages->where('slug', str_slug($slug))->first();
        if (is_null($fields)) {
            return view('errors.404');
        }

        $imag = [];

        if ($fields->image != null) {
            $imag = ["imag" => url('/' . env('UPLOAD_PATH') . '/page/' . $fields->id . '/' . $fields->image)];
        }

        return view('website.page.show', compact('fields', 'imag'));
    }

    public function destroy($id)
    {
        return $this->deleteItem($id, 'page')->with('sucess', 'Done Delete Page From system');
    }
}
