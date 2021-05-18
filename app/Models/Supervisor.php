<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    use HasFactory;

    // A Supervisor Belongs To A Student
    public function Student()
    {
        return $this->belongsToMany(Student::class);
    }
}
