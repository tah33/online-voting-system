<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $fillable = ['user_id','name','symbol','symbol_name','seats'];

    protected $casts = ['seats' => 'array'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function election()
    {
    	return $this->belongsTo(Election::class)->latest()->where('status',1);
    }
}
