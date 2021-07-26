<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalStatus extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'proposal_status';

    protected $primaryKey = 'id';

    protected $fillable = [
        'student_id',
        'supervisor_comments',
        'attempts',
        'status'
    ];
}
