<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',      // foreign key
        'material_id',
        'quantity',
        'project_id',
        'supplier_id'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function supplier()
{
    return $this->belongsTo(Supplier::class, 'supplier_id');
}
}
