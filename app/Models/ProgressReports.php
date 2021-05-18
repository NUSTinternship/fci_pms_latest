<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressReports extends Model
{
    use HasFactory;

    // A Specific Progress Report Belongs To One Student
    public function Student()
    {
        return $this->belongsTo(Student::class);
    }
}
