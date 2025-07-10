<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'description',
        'location',
        'employment_type',
        'application_deadline',
        'qualifications',
        'responsibilities',
        'company_id', 
    ];
    //relationship with application model
    public function applications()
        {
            return $this->hasMany(Application::class);
        }

    //relationship with applicant model
    public function applicants()
    {
        return $this-> hasMany(Applicant::class);
    }

    //relationship with company model
    public function company()
    {
        return $this-> belongsTo(Company::class);
    }

//relationship with feedback model
    public function feedbacks()
{
    return $this->hasMany(Feedback::class);
}

}
