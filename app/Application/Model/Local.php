<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{

    public $table = "local";

    protected $fillable = [
        'name', 'description', 'image', 'price', 'area', 'site_id',
    ];

    public function getSlugAttribute()
    {
        return str_slug($this->name_lang, '-', getCurrentLang());
    }

    public function getUrlAttribute()
    {
        return '/local/' . str_slug($this->name_lang, '-', getCurrentLang());
    }

    public function getNameLangAttribute()
    {
        return is_json($this->name) && is_object(json_decode($this->name)) ? json_decode($this->name)->{getCurrentLang()} : $this->name;
    }
    public function getNameEnAttribute()
    {
        return is_json($this->name) && is_object(json_decode($this->name)) ? json_decode($this->name)->en : $this->name;
    }
    public function getNameArAttribute()
    {
        return is_json($this->name) && is_object(json_decode($this->name)) ? json_decode($this->name)->ar : $this->name;
    }
    public function getNameFrAttribute()
    {
        return is_json($this->name) && is_object(json_decode($this->name)) ? json_decode($this->name)->fr : $this->name;
    }
    public function getDescriptionLangAttribute()
    {
        return is_json($this->description) && is_object(json_decode($this->description)) ? json_decode($this->description)->{getCurrentLang()} : $this->description;
    }
    public function getDescriptionEnAttribute()
    {
        return is_json($this->description) && is_object(json_decode($this->description)) ? json_decode($this->description)->en : $this->description;
    }
    public function getDescriptionArAttribute()
    {
        return is_json($this->description) && is_object(json_decode($this->description)) ? json_decode($this->description)->ar : $this->description;
    }
    public function getDescriptionFrAttribute()
    {
        return is_json($this->description) && is_object(json_decode($this->description)) ? json_decode($this->description)->fr : $this->description;
    }

}
