<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Kanban;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Отображение списка проектных задач в системе
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $selectProject = Project::where('id', $id)->get();
        $groups = Group::where('project_id', $id)->get();
        $workers = User::where('role', 'worker')->get();
        $kanbans = Kanban::get();
        
        return view('includes.pages.kanban',[
            'project' => $selectProject,
            'groups' => $groups,
            'workers' => $workers,
            'kanbans' => $kanbans,
        ]);
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
     * Создание нового проектной задачи и запись её в базу даныых с размещение в Kanban page
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newTask = new Task;
        $newTask->name = $request->name;
        $newTask->description = $request->description;
        $newTask->type = $request->type;
        $newTask->level = $request->level;
        $newTask->endpoint = $request->endpoint;
        $newTask->worker_id = $request->worker;
        $newTask->save();

        $kanban = new Kanban;
        $kanban->group_id = $request->group;
        $kanban->task_id = $newTask->id;
        $kanban->save();

        return $newTask;
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
    public function edit($id)
    {
        //
    }

    /**
     * Обновление группы Kanban page при перемещении проектной задачи с записью в базу данных
     *
     * @param \Illuminate\Http\Request  $request
     * @param int  $task Идентификатор проектной задачи, которую перемещает пользователь
     * @param int $grop Идентификатор группы в которую перемещена проектная задача
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $task, $group)
    {
        $existingTask = Kanban::where(['task_id' => $task])->first();
        if($existingTask){
            $existingTask->group_id = $group;
            $existingTask->save();
            
            return $existingTask;
        }

        return $existingTask;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingTask = Task::find($id);
        $existingKanbanPosition = Kanban::where(['task_id' => $id])->first();
        if($existingTask){
            $existingKanbanPosition->delete();
            $existingTask->delete();
            return "Task delete";
        }
        
        return "Task not found";
    }
}
