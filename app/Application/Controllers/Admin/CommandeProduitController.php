<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\CommandeProduit\AddRequestCommandeProduit;
use App\Application\Requests\Admin\CommandeProduit\UpdateRequestCommandeProduit;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\CommandeProduitsDataTable;
use App\Application\Model\CommandeProduit;
use Yajra\Datatables\Request;
use Alert;

class CommandeProduitController extends AbstractController
{
    public function __construct(CommandeProduit $model)
    {
        parent::__construct($model);
    }

    public function index(CommandeProduitsDataTable $dataTable){
        return $dataTable->render('admin.commandeproduit.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.commandeproduit.edit' , $id);
    }

     public function store(AddRequestCommandeProduit $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('admin/commandeproduit');
     }

     public function update($id , UpdateRequestCommandeProduit $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.commandeproduit.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        return $this->deleteItem($id , 'admin/commandeproduit')->with('sucess' , 'Done Delete commandeproduit From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/commandeproduit')->with('sucess' , 'Done Delete commandeproduit From system');
    }

}
