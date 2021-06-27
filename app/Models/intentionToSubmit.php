<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class intentionToSubmit extends Model
{
    use HasFactory;

    protected $table = 'intentions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'file_name',
        'file_path'
    ];
}
