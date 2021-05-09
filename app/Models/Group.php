<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function tasks()
    {
        return $this->belongsTo('App\Models\User', 'tasks_id', 'id');
    }

    public function projects()
    {
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    }
}
