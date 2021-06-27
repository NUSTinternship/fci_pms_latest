<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    use HasFactory;

    protected $table = 'final_thesis';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'file_name',
        'file_path'
    ];

    // A Specific Thesis Belongs To One Student
    public function Student()
    {
        return $this->belongsTo(Student::class);
    }
}
