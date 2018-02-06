<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
	protected $fillable=['id','orderId','proId','name','description','price'];
}
