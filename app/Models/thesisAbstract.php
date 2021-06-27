<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thesisAbstract extends Model
{
    use HasFactory;

    protected $table = 'thesis_abstracts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'file_name',
        'file_path'
    ];
}
