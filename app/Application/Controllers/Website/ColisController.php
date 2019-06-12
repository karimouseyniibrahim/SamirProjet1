<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Colis;
use App\Application\Requests\Website\Colis\AddRequestColis;
use App\Application\Requests\Website\Colis\UpdateRequestColis;

class ColisController extends AbstractController
{

     public function __construct(Colis $model)
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

			if(request()->has("colis_id") && request()->get("colis_id") != ""){
				$items = $items->where("colis_id","=", request()->get("colis_id"));
			}

			if(request()->has("client_id") && request()->get("client_id") != ""){
				$items = $items->where("client_id","=", request()->get("client_id"));
			}

			if(request()->has("poids") && request()->get("poids") != ""){
				$items = $items->where("poids","=", request()->get("poids"));
			}

			if(request()->has("volume") && request()->get("volume") != ""){
				$items = $items->where("volume","=", request()->get("volume"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.colis.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.colis.edit' , $id);
     }

     public function store(AddRequestColis $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('colis');
     }

     public function update($id , UpdateRequestColis $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.colis.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'colis')->with('sucess' , 'Done Delete Colis From system');
     }


}
