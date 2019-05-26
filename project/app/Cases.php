<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    protected $table = 'cases';

    public function filedBy()
    {
        return $this->belongsTo(User::class, 'filed_by', 'id');
    }

}
