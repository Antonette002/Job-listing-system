<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
     protected $fillable = [
        'user_id',
         'full_name',
         'phone',
         'location',
    ];
    //relationship with user model
    public function user()
    {
        return $this-> belongsTo(User::class);
    }

    //relationship with application model
    public function applications()
    {
        return $this-> hasMany(Application::class);
    }

    //relationship with job model
    public function jobs()
    {
        return $this-> hasMany(Job::class);
    }

    //relationship with feedbacks model
    public function feedbacks()
{
    return $this->hasMany(Feedback::class);
}
}
