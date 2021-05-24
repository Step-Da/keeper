<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель для работы с таблицей Groups
 */
class Group extends Model
{
    /**
     * Связь с таблицей Tasks
     * 
     * @return mixed $this Данные таблицы Tasks для определнной группы
     */
    public function tasks()
    {
        return $this->belongsTo('App\Models\User', 'tasks_id', 'id');
    }

    /**
     * Связь с таблицей Projects
     * 
     * @return mixed $this Данные таблицы Projects для опредленной группы
     */
    public function projects()
    {
        return $this->belongsTo('App\Models\Project', 'project_id', 'id');
    }

    public function kanbans()
    {
        return $this->hasMany('App\Models\Kanban', 'group_id');
    }
}