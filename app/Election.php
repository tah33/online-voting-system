<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    protected $fillable =['name','election_date','start_date','end_date'];

    public function candidates()
    {
        return $this->hasMany(Candidate::class)->latest()->where('status',1);
    }

    public function seats()
    {
        return $this->hasMany(Party::class)->latest();
    }

    public function getStatusNameAttribute()
    {
        if($this->status == 1)
            return "<span class='label label-success'>Active</span>";
        else
            return "<span class='label label-danger'>Inactive</span>";
    }
}
