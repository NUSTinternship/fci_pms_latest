<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plagiarismReport extends Model
{
    use HasFactory;

    protected $table = 'plagiarism_reports';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'file_path'
    ];
}
