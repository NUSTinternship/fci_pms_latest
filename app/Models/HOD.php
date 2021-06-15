<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HOD extends Model
{
    use HasFactory;

    protected $table = 'supervisors';

    protected $primaryKey = 'id';

}
