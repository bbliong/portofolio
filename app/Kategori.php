<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function Work(){
        return $this->hasMany('App\Work');
    }

     public function Blog(){
        return $this->hasMany('App\Blog');
    }
}
