<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    protected $fillable=['user_id','phone','address','image'];
    public function user()
    {
    	return $this->hasOne(User::class);
    }
}
