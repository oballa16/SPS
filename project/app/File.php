<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }

    public function cases()
    {
        return $this->belongsTo(Cases::class, 'case_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
}
