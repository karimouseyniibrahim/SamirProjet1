<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class BureauPoste extends Model
{

  public $table = "bureauposte";


   protected $fillable = [
        'name','adresse','tel','email','image'
   ];

	public function getNameLangAttribute(){
		return is_json($this->name) && is_object(json_decode($this->name)) ?  json_decode($this->name)->{getCurrentLang()}  : $this->name;
	}
	public function getNameFrAttribute(){
		return is_json($this->name) && is_object(json_decode($this->name)) ?  json_decode($this->name)->fr  : $this->name;
	}
	public function getNameArAttribute(){
		return is_json($this->name) && is_object(json_decode($this->name)) ?  json_decode($this->name)->ar  : $this->name;
	}

}
