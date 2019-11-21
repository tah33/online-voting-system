<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $fillable =['name','election_date'];

    public function applies()
    {
        return $this->hasMany(Apply::class);
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
    
}
