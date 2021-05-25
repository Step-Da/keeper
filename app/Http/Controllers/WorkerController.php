<?php

namespace App\Http\Controllers;

use App\Models\Kanban;
use App\Models\Project;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'projects' => Project::where(['remove' => false])->get(),
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
        if ($request->isMethod('post') && $request->file('file')) {
            $projectFloader = Project::find($request->project)->only('path');
            $uploadFile = $request->file('file');
            $uploadFloader = $projectFloader['path']; 
            if($request->path) $uploadFloader = $projectFloader['path'].'/'.$request->path;
            $fileName = $uploadFile->getClientOriginalName();
            Storage::putFileAs($uploadFloader, $uploadFile, $fileName);
        }

        $exisitingTask = Task::find($request->task);
        if($exisitingTask){
            $exisitingTask->completed_at = Carbon::now();
            $exisitingTask->save();
            $this->checkingTaskCompletion($request->task);
        }

        return redirect()->route('account-worker-task-page');
    }

    public function checkingTaskCompletion($id)
    {
        $checkedTask = Task::find($id);
        $completedDate = substr($checkedTask->completed_at, 0, strpos($checkedTask->completed_at, ' ' ));
        $endpointDate = substr($checkedTask->endpoint, 0, strpos($checkedTask->endpoint, ' ' ));
        if(($endpointDate == $completedDate) || ($endpointDate > $completedDate)) $checkedTask->status = true; 
        else $checkedTask->status = false; 
        $checkedTask->save();
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
