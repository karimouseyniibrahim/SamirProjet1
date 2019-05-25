<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{

  public $table = "request";


   protected $fillable = [
        'artisan_id','section_id','local_id','status'
   ];


}
