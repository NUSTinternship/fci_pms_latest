<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaminersReport extends Model
{
    use HasFactory;

    protected $table = 'examiners_reports';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'file_name',
        'file_path',
        'updated_at'
    ];
}
