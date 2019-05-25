<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Site\AddRequestSite;
use App\Application\Requests\Admin\Site\UpdateRequestSite;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\SitesDataTable;
use App\Application\Model\Site;
use Alert;
use Illuminate\Support\Facades\File;

class SiteController extends AbstractController
{
    public function __construct(Site $model)
    {
        parent::__construct($model);
    }

    public function index(SitesDataTable $dataTable)
    {
        return $dataTable->render('admin.site.index');
    }

    public function show($id = null)
    {
        return $this->createOrEdit('admin.site.edit', $id);
    }

    public function store(AddRequestSite $request)
    {
        $item = $this->storeOrUpdate($request, null, true);
        $this->AcMove($item->image, ('\\files\\Site\\' . $item->id));
        return redirect('admin/site');
    }

    public function update($id, UpdateRequestSite $request)
    {
        if ($request->hasfile('image')) {
            $s = $this->model->find($id);
            $tr = File::delete(public_path() . '\\files\\Site\\' . $id . '\\' . $s->image);
        }
        $item = $this->storeOrUpdate($request, $id, true);

        if ($request->hasfile('image')) {
            $this->AcMove($item->image, ('\\files\\Site\\' . $id));

        }

        return redirect()->back();

    }


    public function getById($id)
    {
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.site.show', $id, ['fields' => $fields]);
    }

    public function destroy($id)
    {
        File::deleteDirectory(public_path() . '\\files\\Site\\' . $id);
        return $this->deleteItem($id, 'admin/site')->with('sucess', trans('site.msg.delete'));
    }

    public function pluck(\Illuminate\Http\Request $request)
    {
        return $this->deleteItem($request->id, 'admin/site')->with('sucess', trans('site.msg.delete'));
    }

}
