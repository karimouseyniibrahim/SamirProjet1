<?php

namespace App\Application\Controllers\Admin;

use App\Application\Requests\Admin\Page\AddRequestPage;
use App\Application\Requests\Admin\Page\UpdateRequestPage;
use App\Application\Controllers\AbstractController;
use App\Application\DataTables\PagesDataTable;
use App\Application\Model\Page;
use Yajra\Datatables\Request;
use Alert;
use Illuminate\Support\Facades\File ;
class PageController extends AbstractController
{
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }

    public function index(PagesDataTable $dataTable)
    {
        return $dataTable->render('admin.page.index');
    }

    public function show($id = null)
    {
        return $this->createOrEdit('admin.page.edit', $id);
    }

    public function store(AddRequestPage $request)
    {
        $item = $this->storeOrUpdate($request, null, true);
        if($item->image!=null)
            $this->AcMove($item->image,('\\files\\page\\'.$item->id));
        return redirect('admin/page');
    }

    public function update($id, UpdateRequestPage $request)
    {
        if($request->hasfile('image'))
        { 
        $s=$this->model->find($id);            
            $tr= File::delete(public_path().'\\files\\page\\'.$id.'\\'.$s->image);           
        }
        $item = $this->storeOrUpdate($request, $id, true);
        if($request->hasfile('image'))
          {       
            $this->AcMove($item->image,('\\files\\page\\'.$id));     
            
         }   
        return redirect()->back();
    }

    public function getById($id)
    {
        $fields = $this->model->findOrFail($id);
        
        return $this->createOrEdit('admin.page.show', $id, ['fields' => $fields]);
    }

    public function destroy($id)
    {
        File::deleteDirectory(public_path().'\\files\\page\\'.$id);
        return $this->deleteItem($id, 'admin/page')->with('sucess', 'Done Delete page From system');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/page')->with('sucess' , 'Done Delete page From system');
    }
    public function filedestroy($id){
        
        $item=$this->model->find($id);        
        $infos=trans("page.image-not-delete");
        if($item!=null){
            $image_path = public_path().'/files/page/'.$id.'/'.$item->image;
            if (File::exists($image_path)) {
                File::delete($image_path); 
                              
            }
            $item->update(["image"=>null]);
            $infos=trans("page.image-delete");            
        }        
        return $infos;
    }
}
