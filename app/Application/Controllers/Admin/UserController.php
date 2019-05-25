<?php

namespace App\Application\Controllers\Admin;

use App\Application\Controllers\AbstractController;
use App\Application\DataTables\UserDataTable;
use App\Application\Model\User;
use App\Application\Repository\InterFaces\UserInterface;
use App\Application\Requests\Admin\User\AddRequestUser;
use App\Application\Requests\Admin\User\UpdateRequestUser;
use Yajra\Datatables\Request;
use File;
class UserController extends AbstractController
{
    protected $userInterface;

    public function __construct(User $model , UserInterface $userInterface )
    {
        parent::__construct($model);
        $this->userInterface = $userInterface;
    }

    public function index(UserDataTable $dataTable )
    {
        return $dataTable->render('admin.user.index');
    }

    public function show($id = null){
        $data = $this->userInterface->getPermissions();
        $data['roles_permission'] = $this->userInterface->getPermissionById($id);
       
        return $this->createOrEdit('admin.user.edit' , $id , $data);
    }

    public function store(AddRequestUser $request){
        $request = $this->userInterface->checkRequest($request);
          $item=$this->storeOrUpdate($request , null , true);
          if($request->hasfile('image')){ 
            $this->AcMove($item->image,('\\files\\users\\'.$item->id));
        }           
          return redirect('admin/user');
    }

    public function update($id , UpdateRequestUser $request){
        $l=null;
                             
        if($request->hasfile('image'))
        {   $l=$this->model->find($id);
        } 
        $request = $this->userInterface->checkRequest($request);
        $item= $this->storeOrUpdate($request , $id , true);
        if($l!=null){                     
            $tr= File::delete(public_path().'\\files\\users\\'.$id.'\\'.$l->image);
            $this->AcMove($item->image,('\\files\\users\\'.$item->id));
        }
        return redirect()->back();
    }
    public function profile($id, \Illuminate\Http\Request $request){
        if(auth()->user()->id!=$id){
          return  redirect('admin/home');
        }
        if($request->method()=="POST"){
            $l=null;
            if($request->hasfile('image'))
            {   $l=$this->model->find($id);
            } 
            $request = $this->userInterface->checkRequest($request);
            $item= $this->storeOrUpdate($request , $id , true);
            if($l!=null){                     
                $tr= File::delete(public_path().'\\files\\users\\'.$id.'\\'.$l->image);
                $this->AcMove($item->image,('\\files\\users\\'.$item->id));
                return  redirect('admin/home');
            }           
        }
        return $this->createOrEdit('admin.user.profile' , $id);
    }

    public function getById($id){
        $fields = $this->model->findOrFail($id);
        return $this->createOrEdit('admin.user.show' , $id , ['fields' =>  $fields]);
    }

    public function destroy($id){
        File::deleteDirectory(public_path().'/files/users/'.$id);
        return $this->deleteItem($id , 'admin/user');
    }

    public function pluck(\Illuminate\Http\Request $request){
        return $this->deleteItem($request->id , 'admin/user')->with('sucess' , 'Done Delete user From system');
    }

}
