<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\ZoneActivite\AddRequestZoneActivite;
use App\Application\Requests\Admin\ZoneActivite\UpdateRequestZoneActivite;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\ZoneActivitesDataTable;
use App\Application\Model\ZoneActivite;
use Yajra\Datatables\Request;
use App\Application\Model\BureauPoste;
use Alert;

class ZoneActiviteController extends AbstractController
{
    public function __construct(ZoneActivite $model)
    {
        parent::__construct($model);
    }

    public function index(ZoneActivitesDataTable $dataTable){
        return $dataTable->render('admin.zoneactivite.index');
    }

    public function show($id = null){
        $bureaupostes = transformSelect(BureauPoste::pluck('name', 'id')->all());
        return $this->createOrEdit('admin.zoneactivite.edit' , $id,['bureaupostes' => $bureaupostes]);
    }

     public function store(AddRequestZoneActivite $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/zoneactivite');
     }

     public function update($id , UpdateRequestZoneActivite $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.zoneactivite.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/zoneactivite')->with('sucess' , 'Done Delete zoneactivite From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/zoneactivite')->with('sucess' , 'Done Delete zoneactivite From system');
    }

}
