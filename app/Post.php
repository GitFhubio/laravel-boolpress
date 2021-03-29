<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function author(){
        return $this->belongsTo('App\Author');
    }
    public function comments(){
        return $this->hasMany('App\Comment');
        }
}
