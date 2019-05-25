<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class FilesMedia extends Model
{

  public $table = "filesmedias";


   protected $fillable = [
      'url' , 'medias_id'  
   ];
}
