<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function detail(){
    return $this->hasOne('App\AuthorDetails');
    }
    public function posts(){
    return $this->hasMany('App\Post');
    }
}
