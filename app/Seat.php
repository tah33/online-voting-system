<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = ['user_id','party_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function party()
    {
        return $this->belongsTo(Party::class);
    }

    public function election()
    {
        return $this->belongsTo(Election::class)->latest()->where('status',1);
    }
}
