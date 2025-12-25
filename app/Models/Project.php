<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status_id',
        'place',
        'budget',
        'start_date',
        'end_date',
    ];
}
