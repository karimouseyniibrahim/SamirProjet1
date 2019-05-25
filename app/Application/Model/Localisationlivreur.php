<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Localisationlivreur extends Model
{

  public $table = "localisationlivreur";


   protected $fillable = [
        'user_id','trajetlivreur_id','status'
   ];


}
