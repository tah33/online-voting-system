<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['user_id','apply_id','total'];

    public function applies()
    {
    	return $this->hasMany(Apply::class);
    }
}
