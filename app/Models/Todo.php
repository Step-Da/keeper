<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель для работы с таблицей Todos
 */
class Todo extends Model
{
    /**
     * Связь с таблицей Users
     * 
     * @return mixed $this Данные таблицы Users дял определенной глобальной задачи
     */
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

}