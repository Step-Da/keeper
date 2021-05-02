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
     * Display a listing of the resource.
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
