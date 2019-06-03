<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investigations extends Model
{
    protected $table = 'investigations';


    public function files()
    {

        return $this->hasMany(InvestigationFile::class, 'investigation_id', 'id');
    }

}
