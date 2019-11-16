<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $fillable = ['user_id','election_id','status'];
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function election()
    {
    	return $this->belongsTo(Election::class);
    }

    public function vote()
    {
    	return $this->belongsTo(Vote::class);
    }

}
