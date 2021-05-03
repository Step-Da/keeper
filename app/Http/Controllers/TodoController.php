<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     *  Отображение todo списка у пользователя с сортировкой "ASC"
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('includes.pages.todos', [
            "data" =>Todo::orderBy('completed_at', 'ASC')->get()
        ]);    
    }

    /**
     * Сохраните созданный todo в хранилище (базу данных)
     *
     * @param  \Illuminate\Http\Request  $request Данный переданные пользователем
     * @return \Illuminate\Http\Response
     * @return mixed $newTodo Новая запись todo в базе данных
     */
    public function store(Request $request)
    {
        $newTodo = new Todo;
        $newTodo->name = $request->name;
        $newTodo->user_id = $request->user_id;
        $newTodo->save();

        return $newTodo;
    }

    /**
     * Обновите указанный todo в хранилище (базе данных)
     *
     * @param  \Illuminate\Http\Request  $request Данные переданные пользователем
     * @param  int  $id Идентификатор указанной todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingTodo = Todo::find($id);
        if($existingTodo){
            $existingTodo->status = $request->status ? true : false;
            $existingTodo->completed_at = $request->status ? Carbon::now() : null;
            $existingTodo->save();

            return $existingTodo;
        }

        return "Todo not found";
    }

    /**
     * Удаления указанной todo из хранилища (базы данных)
     *
     * @param  int  $id Идентификатор указанной todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingTodo = Todo::find($id);
        if($existingTodo){
            $existingTodo->delete();
            return "Todo delete";
        }

        return "Todo not found";
    }
}
