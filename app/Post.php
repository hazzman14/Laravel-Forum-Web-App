<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //one to many relationships
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
    //how i would implement one to one
  /* 
   public function phone number()
    {
        return $this->hasOne('App\Phone');
    }
    //how i would implement many to many
    public function tag()
    {
        return $this->belongsTo('App\Post');
    }

    */

}
