<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\TrajetLivreur;
use App\Application\Requests\Website\TrajetLivreur\AddRequestTrajetLivreur;
use App\Application\Requests\Website\TrajetLivreur\UpdateRequestTrajetLivreur;

class TrajetLivreurController extends AbstractController
{

     public function __construct(TrajetLivreur $model)
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

			if(request()->has("user_id") && request()->get("user_id") != ""){
				$items = $items->where("user_id","=", request()->get("user_id"));
			}

			if(request()->has("zoneactivite_id") && request()->get("zoneactivite_id") != ""){
				$items = $items->where("zoneactivite_id","=", request()->get("zoneactivite_id"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.trajetlivreur.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.trajetlivreur.edit' , $id);
     }

     public function store(AddRequestTrajetLivreur $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('trajetlivreur');
     }

     public function update($id , UpdateRequestTrajetLivreur $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.trajetlivreur.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'trajetlivreur')->with('sucess' , 'Done Delete TrajetLivreur From system');
     }


}
