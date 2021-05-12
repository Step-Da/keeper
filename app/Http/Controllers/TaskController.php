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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $selectProject = Project::where('id', $id)->get();
        $groups = Group::where('project_id', $id)->get();
        $workers = User::where('role', 'worker')->get();
        
        return view('includes.pages.kanban',[
            'project' => $selectProject,
            'groups' => $groups,
            'workers' => $workers,
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
     * Store a newly created resource in storage.
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
