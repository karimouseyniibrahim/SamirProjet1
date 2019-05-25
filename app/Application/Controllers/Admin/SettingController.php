<?php

namespace App\Application\Controllers\Admin;

use App\Application\Controllers\AbstractController;
use App\Application\DataTables\SettingsDataTable;
use App\Application\Model\Setting;
use App\Application\Requests\Admin\Setting\AddRequestSetting;
use App\Application\Requests\Admin\Setting\UpdateRequestSetting;
use Yajra\Datatables\Request;
use Alert;
use File;   

class SettingController extends AbstractController
{
    public function __construct(Setting $model)
    {
        parent::__construct($model);
    }

    public function index(SettingsDataTable $dataTable){
        return $dataTable->render('admin.setting.index');
    }

    public function show($id = null){
        return $this->createOrEdit('admin.setting.edit' , $id);
    }

    public function store(AddRequestSetting $request){
         return $this->storeOrUpdate($request , null , 'admin/setting');
    }

    public function update($id , UpdateRequestSetting $request){
        $lastitem=null;
        
        if(isset($request->type) &&$request->type=="image"){
            $lastitem=$this->model->find($id);
            
        }
       
         $items=$this->storeOrUpdate($request , $id , 'admin/setting');

        if($lastitem!=null){            
           $f= File::delete(public_path().'/files/'.$lastitem->body_setting);
          
        }
       

        return $items;
    }

    public function getById($id){
        $fields = $this->model->getConnection()->getSchemaBuilder()->getColumnListing($this->model->getTable());
        return $this->createOrEdit('admin.setting.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        $lastitem=$this->model->find($id);
        if($lastitem->type=="image"){
            $f= File::delete(public_path().'/files/'.$lastitem->body_setting);           
         }

        return $this->deleteItem($id , 'admin/setting')->with('sucess' , 'Done Delete setting From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/setting')->with('sucess' , 'Done Delete setting From system');
    }
}
