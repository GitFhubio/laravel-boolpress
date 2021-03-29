<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorDetails extends Model
{
    public function author(){
        return $this->belongsTo('App\Author');
    }
}
