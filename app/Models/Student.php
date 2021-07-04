<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $primaryKey = 'id';

    protected $fillable = [
        'program',
        'progress',
        'department',
        'supervisor_id',
        'co-supervisor'
    ];

    // Defining Relationship Between Student & User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Defining Relationship Between Student & Supervisor
    public function studentSupervisor()
    {
        return $this->hasMany(Supervisor::class);
    }

    // Defining Relationship Between Student & Proposal
    public function studentProposal()
    {
        return $this->hasOne(Proposal::class);
    }

    // Defining Relationship Between Student & Progress Report
    public function studentProgressReport()
    {
        return $this->hasMany(ProgressReports::class);
    }

    // Defining Relationship Between Student & Thesis
    public function studentThesis()
    {
        return $this->hasOne(Thesis::class);
    }
}
