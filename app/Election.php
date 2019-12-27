<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $fillable =['name','election_date','start_date','end_date'];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
    
}
