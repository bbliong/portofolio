<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{

	protected $guarded = [];
	
    public function Kategori(){
        return $this->BelongsTo('App\Kategori');
    }


    public function Images(){
    	return $this->hasMany('App\Image');
    }
}
