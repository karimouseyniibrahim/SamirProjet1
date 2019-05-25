<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\BureauPoste\AddRequestBureauPoste;
use App\Application\Requests\Admin\BureauPoste\UpdateRequestBureauPoste;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\BureauPostesDataTable;
use App\Application\Model\BureauPoste;
use Yajra\Datatables\Request;
use Alert;

class BureauPosteController extends AbstractController
{
    public function __construct(BureauPoste $model)
    {
        parent::__construct($model);
    }

    public function index(BureauPostesDataTable $dataTable){
        return $dataTable->render('admin.bureauposte.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.bureauposte.edit' , $id);
    }

     public function store(AddRequestBureauPoste $request){
          $item =  $this->storeOrUpdate($request , null , true);
          $this->AcMove($item->image, ('\\files\\bureau\\' . $item->id));
          return redirect('admin/bureauposte');
     }

     public function update($id , UpdateRequestBureauPoste $request){
        $s=null;
        if($request->hasfile('image'))
        { 
            $s=$this->model->find($id);                                   
        }
          $item = $this->storeOrUpdate($request, $id, true);
          if($s!=null)
          { 
              File::delete(public_path().'\\files\\bureau\\'.$s->image);  
              $this->AcMove($item->image,('\\files\\bureau\\'.$id));                               
          }
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.bureauposte.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        $tr= File::deleteDirectory(public_path().'\\files\\produits\\'.$id);
        return $this->deleteItem($id , 'admin/bureauposte')->with('sucess' , 'Done Delete bureauposte From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/bureauposte')->with('sucess' , 'Done Delete bureauposte From system');
    }

}
