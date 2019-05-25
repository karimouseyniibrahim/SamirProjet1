<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Produits\AddRequestProduits;
use App\Application\Requests\Admin\Produits\UpdateRequestProduits;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\ProduitssDataTable;
use App\Application\Model\Produits;
use Yajra\Datatables\Request;
use Alert;

class ProduitsController extends AbstractController
{
    public function __construct(Produits $model)
    {
        parent::__construct($model);
    }

    public function index(ProduitssDataTable $dataTable){
        return $dataTable->render('admin.produits.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.produits.edit' , $id);
    }

     public function store(AddRequestProduits $request){
          $item =  $this->storeOrUpdate($request , null , true);
          $this->AcMove($item->image, ('\\files\\produits\\' . $item->id));
          return redirect('admin/produits');
     }

     public function update($id , UpdateRequestProduits $request){
        $s=null;
        if($request->hasfile('image'))
        { 
            $s=$this->model->find($id);                                   
        }
          $item = $this->storeOrUpdate($request, $id, true);
          if($s!=null)
          { 
              File::delete(public_path().'\\files\\produits\\'.$s->image);  
              $this->AcMove($item->image,('\\files\\produits\\'.$id));                               
          }
return redirect()->back();

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.produits.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){        
        $tr= File::deleteDirectory(public_path().'\\files\\produits\\'.$id);
        return $this->deleteItem($id , 'admin/produits')->with('sucess' , 'Done Delete produits From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/produits')->with('sucess' , 'Done Delete produits From system');
    }

}
