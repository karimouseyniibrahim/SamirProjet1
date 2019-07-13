<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Colis extends Model
{

  public $table = "colis";


   protected $fillable = [
        'colis_id','client_id','poids','volume','valid'
   ];


}
