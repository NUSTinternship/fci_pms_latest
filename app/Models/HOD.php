<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hod extends Model
{
    use HasFactory;

    protected $table = 'hods';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'name'
    ];
}
