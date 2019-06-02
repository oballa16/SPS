<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Cases extends Model
{
    use Searchable;
    protected $table = 'cases';

    public function filedBy()
    {
        return $this->belongsTo(User::class, 'filed_by', 'id');
    }

    public function tasks()
    {

        return $this->hasMany(Task::class, 'case_id', 'id');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'case_id', 'id');
    }

    public function people()
    {
        return $this->belongsToMany(Citizen::class, 'cases_citizens', 'case_id', 'citizen_id')
            ->withTimestamps();
    }

}
