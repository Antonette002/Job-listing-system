<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'email',
        'password'
    ];

    public function hasRole($role)
    {
        return $this->role ===$role;
    }
    
    //applican
    public function applicant()
    {
        return $this->hasOne(Applicant::class);
    }

    //relationship with message model
    public function sentMessages()
{
    return $this->hasMany(Message::class, 'sender_id');
}

public function receivedMessages()
{
    return $this->hasMany(Message::class, 'receiver_id');
}
//company
public function company()
{
    return $this->hasOne(Company::class);
}
}
