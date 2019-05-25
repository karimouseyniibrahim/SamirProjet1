<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Local;
use App\Application\Requests\Website\Local\AddRequestLocal;
use App\Application\Requests\Website\Local\UpdateRequestLocal;
use App\Application\Repository\InterFaces\LocalInterface;

class LocalController extends AbstractController
{

    protected $localInterface;
     public function __construct(Local $model, LocalInterface $localInterface)
     {
        parent::__construct($model);
        $this->localInterface=$localInterface;
     }

     public function index(){
        $items = $this->model;
        $items = $items->paginate(env('PAGINATE'));
        return view('website.local.index' , compact('items'));
     }

     public function show($id = null){
         return $this->createOrEdit('website.local.edit' , $id);
     }

     public function store(AddRequestLocal $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect('local');
     }

     public function update($id , UpdateRequestLocal $request){
          $item = $this->storeOrUpdate($request, $id, true);
return redirect()->back();

     }

     public function getById($id){
         $fields = $this->model->findOrFail($id);
        $data=$this->localInterface->getRequestById($id);
         return $this->createOrEdit('website.local.show' , $id , compact('data','fields'));
     }

     public function getBySlug($slug)
    {
        $locals = $this->model->all();
        $fields = $locals->where('slug', str_slug($slug))->first();
        if (is_null($fields))
            return view('errors.404');

        $data=$this->localInterface->getRequestById($fields->id);
        return $this->createOrEdit('website.local.show' , $fields->id , compact('data','fields'));
    }


     public function destroy($id){
         return $this->deleteItem($id , 'local')->with('sucess' , 'Done Delete Local From system');
     }


}
