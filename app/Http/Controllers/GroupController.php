<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Создание новой группы для Kanban page и запись в базу данных
     *
     * @param  App\Http\Requests\GroupRequest  $request Данные переданные пользователем
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        $newGroup = new Group;
        $newGroup->name = $request->name;
        $newGroup->project_id = $request->project;
        $newGroup->save();

        return $newGroup;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $task)
    {
        
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
        //
    }

    /**
     * Удаление указанной логическской группы из базы данных
     *
     * @param  int  $id Идентификатор логической группы, уоторую удаляет пользователь
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingGroup = Group::find($id);
        if($existingGroup){
            $existingGroup->delete();
            return "Group delete";
        }
        return "Group not found";
    }
}
