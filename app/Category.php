<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table='categories';
    
    public function papers(){
        return $this->belongsToMany('App\Paper','category_papers','paper_id','cat_id');
    }
}
