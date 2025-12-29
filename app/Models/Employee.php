<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

     public function role()
{
    return $this->belongsTo(Role::class, 'role_id', 'id');
}
}

