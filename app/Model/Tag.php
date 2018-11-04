<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    //
    protected $fillable=   ["name"];
    public function posts(){
        return $this->morphedByMany('App\Model\Post','taggable');
    }

    public function videos(){
        return $this->morphedByMany('App\Model\Video','taggable');
    }
}
