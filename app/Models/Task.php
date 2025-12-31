<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  protected $fillable = [
    'name',
    'project_id',
    'status_id',
    'supervisor_id',
    'start_date',
    'end_date',
    'manpower',
];
    protected $table = 'tasks'; 

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function supervisor()
    {
        return $this->belongsTo(Employee::class, 'supervisor_id');
    }

    // Many-to-Many Employees (Workers)
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employees_tasks', 'task_id', 'employee_id')
                    ->withPivot('phase_id');
    }

    public function materials()
    {
        return $this->hasMany(TaskDetail::class, 'task_id');
    }
        public function details(){
    return $this->hasMany(TaskDetail::class, 'task_id', 'id');
}
}

    


