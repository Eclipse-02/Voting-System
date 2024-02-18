<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vision extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'vsn_sq_no',
        'desc',
    ];
}
