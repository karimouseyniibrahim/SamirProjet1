<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\CommandeProduit;
use App\Application\Requests\Website\CommandeProduit\AddRequestCommandeProduit;
use App\Application\Requests\Website\CommandeProduit\UpdateRequestCommandeProduit;

class CommandeProduitController extends AbstractController
{

     public function __construct(CommandeProduit $model)
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

			if(request()->has("modeEnvoi") && request()->get("modeEnvoi") != ""){
				$items = $items->where("modeEnvoi","=", request()->get("modeEnvoi"));
			}

			if(request()->has("devis") && request()->get("devis") != ""){
				$items = $items->where("devis","=", request()->get("devis"));
			}

			if(request()->has("typecommande") && request()->get("typecommande") != ""){
				$items = $items->where("typecommande","=", request()->get("typecommande"));
			}

			if(request()->has("fraistransport") && request()->get("fraistransport") != ""){
				$items = $items->where("fraistransport","=", request()->get("fraistransport"));
			}

			if(request()->has("paye") && request()->get("paye") != ""){
				$items = $items->where("paye","=", request()->get("paye"));
			}

			if(request()->has("dateacheminer") && request()->get("dateacheminer") != ""){
				$items = $items->where("dateacheminer","=", request()->get("dateacheminer"));
			}

			if(request()->has("delaislivraison") && request()->get("delaislivraison") != ""){
				$items = $items->where("delaislivraison","=", request()->get("delaislivraison"));
			}

			if(request()->has("datedebutacheminement") && request()->get("datedebutacheminement") != ""){
				$items = $items->where("datedebutacheminement","=", request()->get("datedebutacheminement"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.commandeproduit.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.commandeproduit.edit' , $id);
     }

     public function store(AddRequestCommandeProduit $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('commandeproduit');
     }

     public function update($id , UpdateRequestCommandeProduit $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.commandeproduit.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'commandeproduit')->with('sucess' , 'Done Delete CommandeProduit From system');
     }


}
