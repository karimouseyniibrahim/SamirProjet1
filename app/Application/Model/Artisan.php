<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Artisan extends Model
{

  public $table = "artisan";


   protected $fillable = [
        'numero_artisan','name','email','telephone','address'
   ];

	public function getNameLangAttribute(){
		return is_json($this->name) && is_object(json_decode($this->name)) ?  json_decode($this->name)->{getCurrentLang()}  : $this->name;
	}
	public function getNameEnAttribute(){
		return is_json($this->name) && is_object(json_decode($this->name)) ?  json_decode($this->name)->en  : $this->name;
	}
	public function getNameArAttribute(){
		return is_json($this->name) && is_object(json_decode($this->name)) ?  json_decode($this->name)->ar  : $this->name;
	}
	public function getNameFrAttribute(){
		return is_json($this->name) && is_object(json_decode($this->name)) ?  json_decode($this->name)->fr  : $this->name;
	}
}
