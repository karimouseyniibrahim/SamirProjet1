<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\BureauPoste;
use App\Application\Requests\Website\BureauPoste\AddRequestBureauPoste;
use App\Application\Requests\Website\BureauPoste\UpdateRequestBureauPoste;

class BureauPosteController extends AbstractController
{

     public function __construct(BureauPoste $model)
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

			if(request()->has("name") && request()->get("name") != ""){
				$items = $items->where("name","like", "%".request()->get("name")."%");
			}

			if(request()->has("adresse") && request()->get("adresse") != ""){
				$items = $items->where("adresse","=", request()->get("adresse"));
			}

			if(request()->has("tel") && request()->get("tel") != ""){
				$items = $items->where("tel","=", request()->get("tel"));
			}

			if(request()->has("email") && request()->get("email") != ""){
				$items = $items->where("email","=", request()->get("email"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.bureauposte.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.bureauposte.edit' , $id);
     }

     public function store(AddRequestBureauPoste $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('bureauposte');
     }

     public function update($id , UpdateRequestBureauPoste $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.bureauposte.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'bureauposte')->with('sucess' , 'Done Delete BureauPoste From system');
     }


}
