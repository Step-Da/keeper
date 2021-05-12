<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kanban extends Model
{
    public function tasks()
    {
        return $this->belongsTo('App\Models\Task', 'task_id', 'id');
    }
}
