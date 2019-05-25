<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Artisan;
use App\Application\Requests\Website\Artisan\AddRequestArtisan;
use App\Application\Requests\Website\Artisan\UpdateRequestArtisan;

class ArtisanController extends AbstractController
{

     public function __construct(Artisan $model)
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

			if(request()->has("numero_artisan") && request()->get("numero_artisan") != ""){
				$items = $items->where("numero_artisan","=", request()->get("numero_artisan"));
			}

			if(request()->has("name") && request()->get("name") != ""){
				$items = $items->where("name","like", "%".request()->get("name")."%");
			}

			if(request()->has("email") && request()->get("email") != ""){
				$items = $items->where("email","=", request()->get("email"));
			}

			if(request()->has("telephone") && request()->get("telephone") != ""){
				$items = $items->where("telephone","=", request()->get("telephone"));
			}

			if(request()->has("address") && request()->get("address") != ""){
				$items = $items->where("address","=", request()->get("address"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.artisan.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.artisan.edit' , $id);
     }

     public function store(AddRequestArtisan $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('artisan');
     }

     public function update($id , UpdateRequestArtisan $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.artisan.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'artisan')->with('sucess' , 'Done Delete Artisan From system');
     }


}
