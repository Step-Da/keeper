<?php

namespace App\Http\Controllers;

use App\Models\Project;
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
     */
    public function index()
    {
        return view('includes.pages.main', [
            'todo' => Todo::count(),
            'user' => User::count(),
            'project' => Project::count(),
        ]);
    }
}
