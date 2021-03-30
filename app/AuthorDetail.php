<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorDetail extends Model
{
    public function author(){
        return $this->belongsTo('App\Author');
    }
}
