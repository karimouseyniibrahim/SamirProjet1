<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Colis\AddRequestColis;
use App\Application\Requests\Admin\Colis\UpdateRequestColis;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\ColissDataTable;
use App\Application\Model\Colis;
use App\Application\Model\User;
use Yajra\Datatables\Request;
use Alert;

class ColisController extends AbstractController
{
    public function __construct(Colis $model)
    {
        parent::__construct($model);
    }

    public function index(ColissDataTable $dataTable){
        return $dataTable->render('admin.colis.index');
    }

    public function show($id = null){
        $clients = User::where('group_id', 5)->pluck('name','id')->all();
        return $this->createOrEdit('admin.colis.edit' , $id, ["clients" => $clients]);
    }

     public function store(AddRequestColis $request){
          $request->request->add(['partenaire_id' => auth()->user()->id]);
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/colis');
     }

     public function update($id , UpdateRequestColis $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.colis.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/colis')->with('sucess' , 'Done Delete colis From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/colis')->with('sucess' , 'Done Delete colis From system');
    }

}
