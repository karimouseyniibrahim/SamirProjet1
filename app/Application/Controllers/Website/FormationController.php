<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use App\Application\Model\Formation;

class FormationController extends AbstractController
{

    public function __construct(Formation $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        $items = $this->model;
        if (request()->has("libelle") && request()->get("libelle") != "") {
            $items = $items->where("libelle", "like", "%" . request()->get("libelle") . "%");
        }

        $items = $items->paginate(env('PAGINATE'));
        $url = setting("formations");
        $imag = [];
        if ($url != null) {
            $imag = ["imag" => url('/' . env('UPLOAD_PATH') . '/' . $url)];
        }

        return view('website.formation.index', compact('items', 'imag'));
    }

    public function getById($id)
    {
        $fields = $this->model->findOrFail($id);
        $items = $this->model;

        $items = transformSelect(Formation::pluck('libelle', 'id')->all());
        return $this->createOrEdit('website.formation.show', $id, ['data' => $items, 'fields' => $fields]);
    }

    public function getBySlug($slug)
    {
        $formations = $this->model->all();
        $fields = $formations->where('slug', str_slug($slug))->first();
        if (is_null($fields)) {
            return view('errors.404');
        }

        $items = transformSelect(Formation::pluck('libelle', 'id')->all());
        return $this->createOrEdit('website.formation.show', $fields->id, ['data' => $items, 'fields' => $fields]);
    }

}
