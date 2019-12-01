<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password','username','dob','role','nid','phone','area','image','symbol','gender',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
 
    public function getRoleNameAttribute()
    {
        return ucwords($this->role);
    }

    public function candidate()
    {
        return $this->hasOne(Candidate::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function party()
    {
        return $this->hasOne(Party::class);
    }
}
