<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proposalSummary extends Model
{
    use HasFactory;

    protected $table = 'proposal_summaries';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'file_path'
    ];
}
