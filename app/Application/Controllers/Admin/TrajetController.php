<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Trajet\AddRequestTrajet;
use App\Application\Requests\Admin\Trajet\UpdateRequestTrajet;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\TrajetsDataTable;
use App\Application\Model\Trajet;
use Yajra\Datatables\Request;
use Alert;
use App\Application\Model\ZoneActivite;
class TrajetController extends AbstractController
{
    public function __construct(Trajet $model)
    {
        parent::__construct($model);
    }

    public function index(TrajetsDataTable $dataTable){
        return $dataTable->render('admin.trajet.index');
    }

    public function show($id = null){
        $zoneactivites = (ZoneActivite::pluck('nameZone', 'id')->all());
        return $this->createOrEdit('admin.trajet.edit' , $id,['zoneactivites' => $zoneactivites]);
    }

     public function store(AddRequestTrajet $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/trajet');
     }

     public function update($id , UpdateRequestTrajet $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.trajet.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/trajet')->with('sucess' , 'Done Delete trajet From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/trajet')->with('sucess' , 'Done Delete trajet From system');
    }

}
