<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verify extends Model
{
    protected $fillable = ['user_id','otp'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
