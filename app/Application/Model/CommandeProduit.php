<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class CommandeProduit extends Model
{

  public $table = "commandeproduit";


   protected $fillable = [
        'modeEnvoi','devis','typecommande','fraistransport','paye','dateacheminer','delaislivraison','datedebutacheminement'
   ];


}
