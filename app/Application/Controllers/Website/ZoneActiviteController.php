<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\ZoneActivite;
use App\Application\Requests\Website\ZoneActivite\AddRequestZoneActivite;
use App\Application\Requests\Website\ZoneActivite\UpdateRequestZoneActivite;

class ZoneActiviteController extends AbstractController
{

     public function __construct(ZoneActivite $model)
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

			if(request()->has("nameZone") && request()->get("nameZone") != ""){
				$items = $items->where("nameZone","=", request()->get("nameZone"));
			}



        $items = $items->paginate(env('PAGINATE'));
        return view('website.zoneactivite.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.zoneactivite.edit' , $id);
     }

     public function store(AddRequestZoneActivite $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('zoneactivite');
     }

     public function update($id , UpdateRequestZoneActivite $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.zoneactivite.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'zoneactivite')->with('sucess' , 'Done Delete ZoneActivite From system');
     }


}
