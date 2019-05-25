<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $table = "page";

    protected $fillable = [
        'title', 'body', 'active', 'image',
    ];

    protected $appends = [
        'url_fr'
    ];

    public function getSlugAttribute()
    {
        return str_slug($this->title_lang, '-', getCurrentLang());
    }

    public function getSlugFrAttribute()
    {
        return str_slug($this->title_fr, '-', 'fr');
    }

    public function getUrlAttribute()
    {
        return '/page/' . str_slug($this->title_lang, '-', getCurrentLang());
    }

    public function getUrlFrAttribute()
    {
        return '/page/' . str_slug($this->title_fr, '-', 'fr');
    }

    public function getTitleLangAttribute()
    {
        return is_json($this->title) && is_object(json_decode($this->title)) ? json_decode($this->title)->{getCurrentLang()} : $this->title;
    }

    public function getTitleEnAttribute()
    {
        return is_json($this->title) && is_object(json_decode($this->title)) ? json_decode($this->title)->en : $this->title;
    }
    public function getTitleFrAttribute()
    {
        return is_json($this->title) && is_object(json_decode($this->title)) ? json_decode($this->title)->fr : $this->title;
    }
    public function getTitleArAttribute()
    {
        return is_json($this->title) && is_object(json_decode($this->title)) ? json_decode($this->title)->ar : $this->title;
    }

    public function getBodyLangAttribute()
    {
        return is_json($this->body) && is_object(json_decode($this->body)) ? json_decode($this->body)->{getCurrentLang()} : $this->body;
    }

    public function getBodyEnAttribute()
    {
        return is_json($this->body) && is_object(json_decode($this->body)) ? json_decode($this->body)->en : $this->body;
    }

    public function getBodyArAttribute()
    {
        return is_json($this->body) && is_object(json_decode($this->body)) ? json_decode($this->body)->ar : $this->body;
    }
    public function getBodyFrAttribute()
    {
        return is_json($this->body) && is_object(json_decode($this->body)) ? json_decode($this->body)->fr : $this->body;
    }
}
