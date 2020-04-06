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

    public function getStatusNameAttribute()
    {
        if($this->status == 1)
            return "<span class='label label-success'>Active</span>";
        else
            return "<span class='label label-danger'>Inactive</span>";
    }
}
