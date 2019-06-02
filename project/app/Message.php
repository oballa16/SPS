<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';


    public function user()
    {
        return $this->belongsTo(User::class, 'officer_id', 'id');
    }

    public function cases()
    {

        return $this->belongsTo(Cases::class, 'case_id', 'id');
    }
}
