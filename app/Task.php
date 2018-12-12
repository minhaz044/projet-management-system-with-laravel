<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'hour',
        'user_id',
        'projet_id',
        'company_id',

    ];

     public function users(){
        return $this->belongsToMany('App\User');   
        }  
      public function project(){
        return $this->belongsTo('App\Project');   
        }
     public function company(){
        return $this->belongsTo('App\Company');   
        }

	public function comments(){
      return $this->morphMany('app\Comment','commentable_type');   
        }
}
