<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Task extends Model
{
    use Searchable;
    protected $table = 'tasks';

    public function officer()
    {
        return $this->belongsTo(User::class, 'officer_id', 'id');
    }

    public function caseRelated()
    {
        return $this->belongsTo(Cases::class, 'case_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'task_id', 'id');
    }

}
