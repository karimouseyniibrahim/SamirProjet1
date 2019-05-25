<?php
namespace App\Application\Repository\Eloquent;

use App\Application\Model\Formation;
use App\Application\Model\Inscription;
use App\Application\Model\Role;
use App\Application\Repository\InterFaces\InscriptionInterface;


class InscriptionEloquent extends AbstractEloquent implements InscriptionInterface{

    public function __construct(Inscription $inscription)
    {
        $this->model = $inscription;
    }


    public function getFormation($id){ 
    	$formations=transformSelect(Formation::where('fin_formation', '>', \Carbon\Carbon::today()->format('Y-m-d'))->pluck('libelle','id')->all());

        if ($id!=null) {
        	$item=$this->model->find($id);
             
            $dinfos=Formation::select('price','debut_formation','fin_formation','places')->find($item->formations_id);
            $price=$dinfos->price;
            $place=$dinfos->places;
            $debut_formation=$dinfos->debut_formation;
            $fin_formation=$dinfos->fin_formation;
            
        }else{
            $price=null;
            $place=null;
            $debut_formation=null;
            $fin_formation=null;
        }

        return $data=[
            'formation'=>$formations,
            'price'=>$price,
            'places'=>$place,
            'fin_formation'=>$fin_formation,
            'debut_formation'=>$debut_formation
        ];
        return null;
    }


}