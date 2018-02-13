<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable=['id','userId','proId','first','last','description','address','city','state','phonenumber','active','balance'];

    public function user()  {
        return $this->hasOne('App\User');
    }
 
    public function product() {
        return $this->hasMany('App\Product');
    }
}
