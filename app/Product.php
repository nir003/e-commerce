<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function category(){
        //many products belongs to one category so
        return $this->belongsTo('App\Category');
    }
    public function manufacture(){
        //many products belongs to one category so
        return $this->belongsTo('App\Manufacture');
    }
}
