<?php

namespace App\Application\Controllers;

use App\Application\Controllers\Traits\ExceptionTrait;
use App\Application\Controllers\Traits\HelpersTrait;
use App\Application\Controllers\Traits\MainProcessTrait;
use App\Application\Controllers\Traits\ModelRelationTrait;
use App\Application\Controllers\Traits\PermissionTrait;
use App\Application\Controllers\Traits\UploadTrait;
use App\Application\Model\Log;
use App\Application\PermissionTraits\PermissionControl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File ;

abstract class AbstractController extends  Controller{

    use  PermissionTrait , UploadTrait , MainProcessTrait , HelpersTrait , ModelRelationTrait , ExceptionTrait;

    public $model;
    protected  $log;
    protected $related ;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->log = new Log();
    }


    public function AcMove($file,$tar){
        if(!file_exists(public_path($tar))){            
            $f =File::makeDirectory(public_path($tar),$mode = 0777, true, true);
        }
        File::move(public_path('\\files\\'.$file),public_path($tar.'\\'.$file));                        
    }
}