<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $table='papers';

    public function users(){
        return $this->belongsToMany('App\User','paper_users','paper_id','user_id');
    }
     public function categories(){
        return $this->belongsToMany('App\Category','category_papers','paper_id','cat_id');
    }
}
