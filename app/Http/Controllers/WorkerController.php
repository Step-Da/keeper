<?php

namespace App\Http\Controllers;

use App\Models\Kanban;
use App\Models\Project;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('includes.pages.worker',[
            'projects' => Project::get(),
            'kanbans' => Kanban::get(),
        ]);
    }

    public function description($project, $task)
    {   
        return view('includes.widgets.description', [
            'project' => Project::find($project),
            'task' => Task::find($task),
        ]);
    }

    public function simple($id)
    {
        $exisitingTask = Task::find($id);
        if($exisitingTask){
            $exisitingTask->completed_at = Carbon::now();
            $exisitingTask->save();
            return $this->checkingTaskCompletion($id);
        }

        return 'Task not found';
    }

    public function load(Request $request)
    {
        dd($request);
    }

    public function checkingTaskCompletion($id)
    {
        $checkedTask = Task::find($id);
        if($checkedTask->completed_at <= $checkedTask->endpoint){ $checkedTask->status = true; }
        else{ $checkedTask->status = false; }
        $checkedTask->save();

        return $checkedTask;
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
        //
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
