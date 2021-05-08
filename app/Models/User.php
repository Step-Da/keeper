<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function todos()
    {
        return $this->hasMany('App\Models\Todo', 'user_id');
    }

    public function projects()
    {
        return $this->hasMany('App\Models\Project', 'user_id');
    }
}
