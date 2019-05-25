<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{

  public $table = "inscription";


   protected $fillable = [
        'numero_artisan','name','email','adresse','telephone','status','formation_id'
   ];


}
