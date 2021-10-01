<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable =['name','email','addres','phone_number','note'];
    function Bill(){
        return $this->hasOne('App\Bill');
    }
}
