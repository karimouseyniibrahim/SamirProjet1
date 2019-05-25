<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Formation\AddRequestFormation;
use App\Application\Requests\Admin\Formation\UpdateRequestFormation;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\FormationsDataTable;
use App\Application\Model\Formation;
use Yajra\Datatables\Request;
use Alert;
use Illuminate\Support\Facades\File;

class FormationController extends AbstractController
{
    public function __construct(Formation $model)
    {
        parent::__construct($model);
    }

    public function index(FormationsDataTable $dataTable)
    {
        return $dataTable->render('admin.formation.index');
    }

    public function show($id = null)
    {
        return $this->createOrEdit('admin.formation.edit', $id);
    }

    public function store(AddRequestFormation $request)
    {

        $item = $this->storeOrUpdate($request, null, true);
        $this->AcMove($item->image, ('\\files\\Formation\\' . $item->id));
        return redirect('admin/formation');
    }

    public function update($id, UpdateRequestFormation $request)
    {

        if ($request->hasfile('image')) {
            $f = $this->model->find($id);
            $tr = File::delete(public_path() . '\\files\\Formation\\' . $id . '\\' . $f->image);
        }
        $item = $this->storeOrUpdate($request, $id, true);
        if ($request->hasfile('image')) {
            $this->AcMove($item->image, ('\\files\\Formation\\' . $id));
        }
        return redirect()->back();

    }


    public function getById($id)
    {
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.formation.show', $id, ['fields' => $fields]);
    }

    public function destroy($id)
    {
        File::deleteDirectory(public_path() . '\\files\\Formation\\' . $id);
        return $this->deleteItem($id, 'admin/formation')->with('sucess', trans('formation.msg.delete'));
    }

    public function pluck(\Illuminate\Http\Request $request)
    {
        return $this->deleteItem($request->id, 'admin/formation')->with('sucess', trans('formation.msg.delete'));
    }


}
