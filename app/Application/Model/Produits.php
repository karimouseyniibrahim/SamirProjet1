<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{

  public $table = "produits";


   protected $fillable = [
        'Libeller','description','prix','image'
   ];

	public function getLibellerLangAttribute(){
		return is_json($this->Libeller) && is_object(json_decode($this->Libeller)) ?  json_decode($this->Libeller)->{getCurrentLang()}  : $this->Libeller;
	}
	public function getLibellerFrAttribute(){
		return is_json($this->Libeller) && is_object(json_decode($this->Libeller)) ?  json_decode($this->Libeller)->fr  : $this->Libeller;
	}
	public function getLibellerArAttribute(){
		return is_json($this->Libeller) && is_object(json_decode($this->Libeller)) ?  json_decode($this->Libeller)->ar  : $this->Libeller;
	}
	public function getDescriptionLangAttribute(){
		return is_json($this->description) && is_object(json_decode($this->description)) ?  json_decode($this->description)->{getCurrentLang()}  : $this->description;
	}
	public function getDescriptionFrAttribute(){
		return is_json($this->description) && is_object(json_decode($this->description)) ?  json_decode($this->description)->fr  : $this->description;
	}
	public function getDescriptionArAttribute(){
		return is_json($this->description) && is_object(json_decode($this->description)) ?  json_decode($this->description)->ar  : $this->description;
	}

}
