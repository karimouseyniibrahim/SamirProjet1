<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\RequestLocal;
use App\Application\Requests\Website\Request\AddRequestRequest;
use App\Application\Requests\Website\Request\UpdateRequestRequest;

class RequestController extends AbstractController
{

     public function __construct(RequestLocal $model)
     {
        parent::__construct($model);
     }

     public function index(){
        $items = $this->model;

        $items = $items->paginate(env('PAGINATE'));
        return view('website.request.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.request.edit' , $id);
     }

     public function store(AddRequestRequest $request){
          $item =  $this->storeOrUpdate($request , null , true);
          if ($item!=null){
            Alert::success('Success Message', 'Optional Title');
          }else{

          }
          
          return redirect()->back();
     }

     public function update($id , UpdateRequestRequest $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
         return $this->createOrEdit('website.request.show' , $id , ['fields' =>  $fields]);
     }

     public function destroy($id){
         return $this->deleteItem($id , 'request')->with('sucess' , 'Done Delete Request From system');
     }


}
