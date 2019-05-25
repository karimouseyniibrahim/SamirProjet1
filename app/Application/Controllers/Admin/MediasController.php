<?php

namespace App\Application\Controllers\Admin;
use Illuminate\Support\Arr;
use App\Application\Requests\Admin\Medias\AddRequestMedias;
use App\Application\Requests\Admin\Medias\UpdateRequestMedias;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\MediassDataTable;
use App\Application\Model\Medias;
use App\Application\Model\FilesMedia;
use Yajra\Datatables\Request;
use Illuminate\Support\Facades\Storage;
use Alert;
use Illuminate\Support\Facades\File ;

class MediasController extends AbstractController
{
    public function __construct(Medias $model)
    {
        parent::__construct($model);
    }

    public function index(MediassDataTable $dataTable){
        return $dataTable->render('admin.medias.index');
    }

    public function show($id = null){
        $files=[];

        $type=['1'=>trans("medias.galery"),
               '2'=>trans("medias.nomenclature")];
        if($id!=null){
            $files=FilesMedia::where('medias_id',$id)->get()->all();
        }
        return $this->createOrEdit('admin.medias.edit' , $id,compact('files','type'));
    }

     public function store(AddRequestMedias $request){

            $ext=$request->type!=1?'file':'image';
            $validate=$this->validate($request, [
                "files.*" => "required|".$ext,
                "name.*" => "required",
                "description.*" => "required",
                "type" => "required",
            ]);
              
            $new_request = new AddRequestMedias();
        if($request->hasfile('files'))
         {
            //files uploads 
            
            $request->request->remove('files');
            //store infos 
            $item =  $this->storeOrUpdate($request , null , true);
        //    dd($item);
            $medias_id= $item->id;
            $arrays = json_decode($item->files);
            foreach($arrays as $file){
                $this->AcMove($file,('\\files\\medias\\'.$medias_id)); 
                $url='/files/medias/'.$medias_id.'/'.$file;     
                $file = FilesMedia::create(compact('url','medias_id'));
            }
                          
           $item->update(['files'=>null]);
        }

          return redirect('admin/medias')->with('success', trans('medias.upload-success'));;
     }

     public function update($id , UpdateRequestMedias $request){
        if($request->hasfile('files'))
        {
            $ext=$request->type!=1?'file':'image';
            $validate=$this->validate($request, [
                "files.*" => "required|".$ext              
            ]);
        }
        $item = $this->storeOrUpdate($request, $id, true);
         if($request->hasfile('files'))
         {
            $medias_id=$id;
            $arrays = json_decode($item->files);
            foreach($arrays as $file){
                $this->AcMove($file,('\\files\\medias\\'.$medias_id)); 
                $url='/files/medias/'.$medias_id.'/'.$file;     
                $file = FilesMedia::create(compact('url','medias_id'));
            }
            $item->update(['files'=>null]);
                        
        } 
         
          return redirect('admin/medias');

     }


    public function getById($id){
        $fields = $this->model->findOrFail($id);

        return $this->createOrEdit('admin.medias.show' , $id , ['fields' =>  $fields]);
    }
    public function destroy($id){
        File::deleteDirectory(public_path().'/files/medias/'.$id);
        return $this->deleteItem($id , 'admin/medias')->with('sucess' , 'Done Delete medias From system');
    }
    
    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/medias')->with('sucess' , 'Done Delete medias From system');
    }


    public function filedestroy($id){
        
        $item=FilesMedia::find($id);        
        $infos=trans("medias.file-not-delete");
        if($item!=null){
            $image_path = public_path().$item->url;
            if (File::exists($image_path)) {
                File::delete($image_path);               
            }
            $item->delete();
            $infos=trans("medias.file-delete");            
        }        
        return $infos;
    }

}
