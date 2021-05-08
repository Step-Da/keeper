<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
