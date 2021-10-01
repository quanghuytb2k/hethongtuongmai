<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    //
    
    protected $fillable =['name','email','addres','phonenumber','product','soluong','payment','giatri','status','code'];
    function products(){
        return $this->belongsToMany('App\Product');
    }
    
}
