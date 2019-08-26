<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    protected $guarded = [];
	
    public function Kategori(){
        return $this->BelongsTo('App\Kategori');
    }
}
