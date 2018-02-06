<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable=['id','userId','userFirst','userLast','reviewerId','reviewerFirst','reviewerLast','rating','tagline','description'];
}
