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
        'co-supervisor_id',
        'proposal_id',
        'thesis_id',
        'progress_id'
    ];
}
