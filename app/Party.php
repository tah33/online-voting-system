<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $fillable = ['user_id','name','symbol','symbol_name','seats'];

    protected $casts = ['seats' => 'array'];

}
