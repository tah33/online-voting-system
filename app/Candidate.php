<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Candidate extends Model
{
	use SoftDeletes;

    protected $fillable = ['user_id','election_id','votes'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function election()
    {
    	return $this->belongsTo(Election::class);
    }
}
