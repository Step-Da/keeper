<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель для работы с таблицей Tasks
 */
class Task extends Model
{
    /** 
     * Связь с таблицей Users
     * 
     * @return mixed $this Данные таблицы Users для опредленной пректной задачи
    */
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    /**
     * Связь с таблицей Kanban
     * 
     * @return mixed $this Данные таблицы Kanbans для опредленной проектной задачи
     */
    public function kanbans()
    {
        return $this->hasMany('App\Models\Kanban', 'task_id');
    }
}