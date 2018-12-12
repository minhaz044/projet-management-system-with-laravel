<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
        protected $fillable = [
        'body',
        'url',
        'user_id',
        'commentable_type',
        'commentable_id',

    ];


 	public function commentable(){
      return $this->morphTo();   
        }

/*
 	public function company(){
      return $this->belongsTo('app/Company');   
        }
 	public function task(){
      return $this->belongsTo('app/Task');   
        }

     */
  	public function user(){
      return $this->belongsTo('App\User');   
        }
        
}
