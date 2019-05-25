<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Localisationlivreur\AddRequestLocalisationlivreur;
use App\Application\Requests\Admin\Localisationlivreur\UpdateRequestLocalisationlivreur;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\LocalisationlivreursDataTable;
use App\Application\Model\Localisationlivreur;
use App\Application\Model\TrajetLivreur;
use Yajra\Datatables\Request;
use Alert;

class LocalisationlivreurController extends AbstractController
{
    public function __construct(Localisationlivreur $model)
    {
        parent::__construct($model);
    }

    public function index(LocalisationlivreursDataTable $dataTable){
        return $dataTable->render('admin.localisationlivreur.index');
    }

    public function show($id = null){
         //auth()->user()->id
         $trajets = (TrajetLivreur::where('user_id',auth()->user()->id)->pluck('user_id', 'id')->all());
        return $this->createOrEdit('admin.localisationlivreur.edit' , $id,['user' => auth()->user()->id,'trajets' => $trajets]);
    }

     public function store(AddRequestLocalisationlivreur $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/localisationlivreur');
     }

     public function update($id , UpdateRequestLocalisationlivreur $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.localisationlivreur.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/localisationlivreur')->with('sucess' , 'Done Delete localisationlivreur From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/localisationlivreur')->with('sucess' , 'Done Delete localisationlivreur From system');
    }

}
