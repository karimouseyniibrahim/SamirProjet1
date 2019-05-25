<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Produits;
use App\Application\Requests\Website\Produits\AddRequestProduits;
use App\Application\Requests\Website\Produits\UpdateRequestProduits;

class ProduitsController extends AbstractController
{

     public function __construct(Produits $model)
     {
        parent::__construct($model);
     }

     public function index(){
        $items = $this->model;

        if(request()->has('from') && request()->get('from') != ''){
            $items = $items->whereDate('created_at' , '>=' , request()->get('from'));
        }

        if(request()->has('to') && request()->get('to') != ''){
            $items = $items->whereDate('created_at' , '<=' , request()->get('to'));
        }

			if(request()->has("Libeller") && request()->get("Libeller") != ""){
				$items = $items->where("Libeller","like", "%".request()->get("Libeller")."%");
			}

			if(request()->has("description") && request()->get("description") != ""){
				$items = $items->where("description","like", "%".request()->get("description")."%");
			}

			if(request()->has("prix") && request()->get("prix") != ""){
				$items = $items->where("prix","=", request()->get("prix"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.produits.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.produits.edit' , $id);
     }

     public function store(AddRequestProduits $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('produits');
     }

     public function update($id , UpdateRequestProduits $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.produits.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'produits')->with('sucess' , 'Done Delete Produits From system');
     }


}
