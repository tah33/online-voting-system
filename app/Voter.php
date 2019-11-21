<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    protected $fillable = ['user_id','candidate_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function candidate()
    {
    	return $this->belongsTo(Candidate::class);
    }

    public function election()
    {
    	return $this->belongsTo(Election::class);
    }
}
