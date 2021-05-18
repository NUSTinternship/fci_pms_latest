<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    // A Specific Proposal Belongs To One Student
    public function Student()
    {
        return $this->belongsTo(Student::class);
    }
}
