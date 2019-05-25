<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class TrajetLivreur extends Model
{

  public $table = "trajetlivreur";


   protected $fillable = [
        'user_id','zoneactivite_id'
   ];


}
