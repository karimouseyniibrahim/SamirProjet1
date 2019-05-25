<?php

namespace App\Application\Controllers\Admin;

use App\Application\Controllers\AbstractController;
use App\Application\Model\User;
use App\Application\Repository\InterFaces\UserInterface;
use Yajra\Datatables\Request;
use File;
class ProfileController extends AbstractController
{
    protected $userInterface;

    public function __construct(User $model , UserInterface $userInterface )
    {
        parent::__construct($model);
        $this->userInterface = $userInterface;
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

}
