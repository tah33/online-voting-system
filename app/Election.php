<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $fillable =['name','start_date','end_date','election_date'];
    public function applies()
    {
        return $this->hasMany(Apply::class);
    }
    
}
