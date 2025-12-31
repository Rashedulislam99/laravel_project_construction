<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materials';

    public function supplier()  
    {
        return $this->belongsTo(Supplier::class); // এখানে foreign key যেমন আছে তেমনই রাখো
    }
    
}
