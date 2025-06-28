<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'industry',
        'email',
        'description',
        'logo_path',
];
    
    //relationship with job model
    public function jobs()
    {
        return $this-> hasMany(Job::class);
    }
}
