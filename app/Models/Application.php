<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
    'job_id',
    'applicant_id',
    'cover_letter',
    'cv_path',
    'portfolio_path',
    'status',
];


    //relationship with job model
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    //relationship with applicant model
    public function applicant()
    {
        return $this-> belongsTo(Applicant::class);
    }
}

