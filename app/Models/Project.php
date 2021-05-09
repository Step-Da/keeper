<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function groups()
    {
        return $this->hasMany('App\Models\Group', 'tasks_id');
    }
}
