<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

     protected $fillable = [
        'applicant_id',
        'job_id',
        'message',
        'rating',
 
    ];
    public function applicant()
{
    return $this->belongsTo(Applicant::class);
}

public function job()
{
    return $this->belongsTo(Job::class);
}

}
