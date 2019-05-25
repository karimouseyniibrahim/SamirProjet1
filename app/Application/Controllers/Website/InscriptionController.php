<?php

namespace App\Application\Controllers\Website;

use App\Application\Controllers\AbstractController;
use Alert;
use App\Application\Model\Inscription;
use App\Application\Requests\Website\Inscription\AddRequestInscription;
use App\Application\Requests\Website\Inscription\UpdateRequestInscription;

class InscriptionController extends AbstractController
{

     public function __construct(Inscription $model)
     {
        parent::__construct($model);
     }

     public function store(AddRequestInscription $request){
          $item =  $this->storeOrUpdate($request , null , true);
          return redirect()->back();
     }

}
