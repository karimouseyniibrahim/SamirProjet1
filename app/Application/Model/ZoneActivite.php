<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class ZoneActivite extends Model
{

  public $table = "zoneactivite";


   protected $fillable = [
        'nameZone',"bureauposte_id"
   ];


}
