<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{

  public $table = "trajet";


   protected $fillable = [
        'trajetname','zoneactivite_id'
   ];

	public function getTrajetnameLangAttribute(){
		return is_json($this->trajetname) && is_object(json_decode($this->trajetname)) ?  json_decode($this->trajetname)->{getCurrentLang()}  : $this->trajetname;
	}
	public function getTrajetnameFrAttribute(){
		return is_json($this->trajetname) && is_object(json_decode($this->trajetname)) ?  json_decode($this->trajetname)->fr  : $this->trajetname;
	}
	public function getTrajetnameArAttribute(){
		return is_json($this->trajetname) && is_object(json_decode($this->trajetname)) ?  json_decode($this->trajetname)->ar  : $this->trajetname;
	}

}
