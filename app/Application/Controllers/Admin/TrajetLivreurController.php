<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\TrajetLivreur\AddRequestTrajetLivreur;
use App\Application\Requests\Admin\TrajetLivreur\UpdateRequestTrajetLivreur;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\TrajetLivreursDataTable;
use App\Application\Model\TrajetLivreur;
use Yajra\Datatables\Request;
use Alert;
use App\Application\Model\ZoneActivite;
use App\Application\Model\User;
class TrajetLivreurController extends AbstractController
{
    public function __construct(TrajetLivreur $model)
    {
        parent::__construct($model);
    }

    public function index(TrajetLivreursDataTable $dataTable){
        return $dataTable->render('admin.trajetlivreur.index');
    }

    public function show($id = null){
        $users = (User::where('group_id',4)->pluck('name', 'id')->all());
        $zoneactivites = (ZoneActivite::pluck('nameZone', 'id')->all());
        return $this->createOrEdit('admin.trajetlivreur.edit' , $id,['zoneactivites' => $zoneactivites,'users' => $users]);
    }

     public function store(AddRequestTrajetLivreur $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/trajetlivreur');
     }

     public function update($id , UpdateRequestTrajetLivreur $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.trajetlivreur.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/trajetlivreur')->with('sucess' , 'Done Delete trajetlivreur From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/trajetlivreur')->with('sucess' , 'Done Delete trajetlivreur From system');
    }

}
