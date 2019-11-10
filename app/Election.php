<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $fillable =['name'];
    public function apply()
    {
        return $this->hasOne(Apply::class);
    }
    
}
