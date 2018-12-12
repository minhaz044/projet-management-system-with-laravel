<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjetUser extends Model
{
    //
    protected $fillable = [
   
        'user_id',
        'project_id',

    ];
}
