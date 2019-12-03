<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['division_id','name'];

    public function users()
    {
    	return $this->hasMany(User::class,'area');
    }
}
