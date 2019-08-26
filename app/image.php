<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    
	protected $guarded = [];
	
    public function Images(){
    	return $this->hasMany('App\Images');
    }
}
