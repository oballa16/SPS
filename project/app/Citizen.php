<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Citizen extends Model
{
    use Searchable;
    protected $table = 'citizens';

    public function cases()
    {

        return $this->belongsToMany(
            Cases::class, 'cases_citizens', 'citizen_id', 'case_id'
        );
    }
}
