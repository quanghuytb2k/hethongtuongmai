<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use SoftDeletes;
    protected $fillable =['name','content','price','thumbnail','code','old_price','soluong','cat_id'];
    function checkouts(){
        return $this->belongsToMany('App\Checkout');
    }
}
