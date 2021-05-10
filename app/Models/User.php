<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель для работы с таблецей User
 */
class User extends Model
{
    /**
     * Связь с таблицей Todos по user_id
     * 
     * @return mixed $this Данные таблицы Todos для опредленного пользователя
     */
    public function todos()
    {
        return $this->hasMany('App\Models\Todo', 'user_id');
    }

    /**
     * Связь с таблицей Projects по user_id
     * 
     * @return mixed $this Данные таблицы Projects для опредленного пользователя
     */
    public function projects()
    {
        return $this->hasMany('App\Models\Project', 'user_id');
    }

    /**
     * Связь с таблицей Tasks по worker_id
     * 
     * @return mixed $this Данные таблицы Tasks для определенного пользователя
     */
    public function tasks()
    {
        return $this->hasMany('App\Models\Task', 'worker_id');
    }
}