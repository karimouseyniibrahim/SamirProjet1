<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Localisationlivreur;
use App\Application\Requests\Website\Localisationlivreur\AddRequestLocalisationlivreur;
use App\Application\Requests\Website\Localisationlivreur\UpdateRequestLocalisationlivreur;

class LocalisationlivreurController extends AbstractController
{

     public function __construct(Localisationlivreur $model)
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

			if(request()->has("trajetlivreur_id") && request()->get("trajetlivreur_id") != ""){
				$items = $items->where("trajetlivreur_id","=", request()->get("trajetlivreur_id"));
			}

			if(request()->has("status") && request()->get("status") != ""){
				$items = $items->where("status","=", request()->get("status"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.localisationlivreur.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.localisationlivreur.edit' , $id);
     }

     public function store(AddRequestLocalisationlivreur $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('localisationlivreur');
     }

     public function update($id , UpdateRequestLocalisationlivreur $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.localisationlivreur.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'localisationlivreur')->with('sucess' , 'Done Delete Localisationlivreur From system');
     }


}
