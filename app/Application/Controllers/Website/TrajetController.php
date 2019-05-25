<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Trajet;
use App\Application\Requests\Website\Trajet\AddRequestTrajet;
use App\Application\Requests\Website\Trajet\UpdateRequestTrajet;

class TrajetController extends AbstractController
{

     public function __construct(Trajet $model)
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

			if(request()->has("trajetname") && request()->get("trajetname") != ""){
				$items = $items->where("trajetname","like", "%".request()->get("trajetname")."%");
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.trajet.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.trajet.edit' , $id);
     }

     public function store(AddRequestTrajet $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('trajet');
     }

     public function update($id , UpdateRequestTrajet $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.trajet.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'trajet')->with('sucess' , 'Done Delete Trajet From system');
     }


}
