<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель для работы с таблицей Kanban
 */
class Kanban extends Model
{
    /**
     * Связь с таблицей Tasks
     * 
     * @return mixed $this Данные таблицы Tasks для опредленной позиции на Kanban page
     */
    public function tasks()
    {
        return $this->belongsTo('App\Models\Task', 'task_id', 'id');
    }
}
