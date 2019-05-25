<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Artisan\AddRequestArtisan;
use App\Application\Requests\Admin\Artisan\UpdateRequestArtisan;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\ArtisansDataTable;
use App\Application\Model\Artisan;
use Yajra\Datatables\Request;
use Alert;

class ArtisanController extends AbstractController
{
    public function __construct(Artisan $model)
    {
        parent::__construct($model);
    }

    public function index(ArtisansDataTable $dataTable)
    {
        return $dataTable->render('admin.artisan.index');
    }

    public function show($id = null)
    {
        return $this->createOrEdit('admin.artisan.edit', $id);
    }

    public function store(AddRequestArtisan $request)
    {
        $item = $this->storeOrUpdate($request, null, true);
        return redirect('admin/artisan');
    }

    public function update($id, UpdateRequestArtisan $request)
    {
        $item = $this->storeOrUpdate($request, $id, true);
        return redirect()->back();

    }


    public function getById($id)
    {
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.artisan.show', $id, ['fields' => $fields]);
    }

    public function destroy($id)
    {
        return $this->deleteItem($id, 'admin/artisan')->with('sucess', trans('artisan.msg.delete'));
    }

    public function pluck(\Illuminate\Http\Request $request)
    {
        return $this->deleteItem($request->id, 'admin/artisan')->with('sucess', trans('artisan.msg.delete'));
    }

}
