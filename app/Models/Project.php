<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель для работы с таблицей Projects
 */
class Project extends Model
{
    /**
     * Связь с таблицей Users
     * 
     * @return mixed $this Данные таблицы Users для опредленного программного проекта
     */
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    /**
     * Связь с таблицкй Groups по tasks_id
     * 
     * @return mixed $this Данные таблицы Groups для определенного программного проекта
     */
    public function groups()
    {
        return $this->hasMany('App\Models\Group', 'tasks_id');
    }
}