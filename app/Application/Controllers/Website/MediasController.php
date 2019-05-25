<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Medias;
use App\Application\Requests\Website\Medias\AddRequestMedias;
use App\Application\Requests\Website\Medias\UpdateRequestMedias;

class MediasController extends AbstractController
{

    public function __construct(Medias $model)
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

        if (request()->has("name") && request()->get("name") != "") {
            $items = $items->where("name", "like", "%" . request()->get("name") . "%");
        }

        if (request()->has("description") && request()->get("description") != "") {
            $items = $items->where("description", "like", "%" . request()->get("description") . "%");
        }

        if (request()->has("type") && request()->get("type") != "") {
            $items = $items->where("type", "=", request()->get("type"));
        }


        $items = $items->paginate(env('PAGINATE'));
        return view('website.medias.index', compact('items'));
    }

    public function show($id = null)
    {
        return $this->createOrEdit('website.medias.edit', $id);
    }

    public function store(AddRequestMedias $request)
    {
        $item = $this->storeOrUpdate($request, null, true);
        return redirect('medias');
    }

    public function update($id, UpdateRequestMedias $request)
    {
        $item = $this->storeOrUpdate($request, $id, true);
        return redirect()->back();

    }

    public function getById($id)
    {
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('website.medias.show', $id, ['fields' => $fields]);
    }

    public function destroy($id)
    {
        return $this->deleteItem($id, 'medias')->with('sucess', 'Done Delete Medias From system');
    }

    public function gallery()
    {

        $items = $this->model->all()->load('filesmedia:medias_id,url as src')->where('type', 1);
        // $data=$this->model->load('filesmedia:medias_id,url as src');

        // $items = $items->paginate(env('PAGINATE'));

        return view('website.medias.gallery', compact('items'));
    }

    public function nomenclature()
    {

        $items = $this->model->load('filesmedia:medias_id,url as src')->where('type', 2);
        // $data=$this->model->load('filesmedia:medias_id,url as src');

        $items = $items->paginate(env('PAGINATE'));
        return view('website.medias.nomenclature', compact('items'));
    }

}
