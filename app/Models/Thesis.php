<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasFactory;

    // A Specific Thesis Belongs To One Student
    public function Student()
    {
        return $this->belongsTo(Student::class);
    }
}
