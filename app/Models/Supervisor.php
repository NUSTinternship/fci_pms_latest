<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    use HasFactory;

    protected $table = 'supervisors';

    protected $primaryKey = 'id';

    protected $fillable = [
        'department',
        'office',
        'phone',
        'workload',
        'hod_id'
    ];

    // A Supervisor Belongs To A Student
    public function Student()
    {
        return $this->belongsToMany(Student::class);
    }
}
