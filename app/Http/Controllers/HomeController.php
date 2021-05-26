<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Создание нового экземпляра контроллера
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Отображение информации для пользователя на main page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * @return int $todo Количество глобальных задач в системе для счетчика 
     * @return int $user Количество профилей пользователей в систепме для счетчика 
     * @return int $projects Количество программных проектов в системе для счетчика 
     * @return int $errors Количество ошибок при разработке программного проекта
     */
    public function index()
    {
        return view('includes.pages.main', [
            'todos' => Todo::count(),
            'users' => User::count(),
            'projects' => Project::count(),
            'errors' => Task::where(['status' => false, 'completed_at' => null])->count(),
        ]);
    }
}
