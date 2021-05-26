<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Group;
use App\Models\Kanban;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class ProjectController extends Controller
{
    /**
     * Отображение списка программных проектов в систем
     *
     * @return \Illuminate\Http\Response
     * @return mixed $project Данные о всех программных проектов в базе данных
     */
    public function index()
    {  
        return view('includes.pages.projects',[
            'projects' => Project::get(),
            'groups' => Group::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Создание нового программного проекта и запись его в базу данных
     *
     * @param  \Illuminate\Http\Request  $request Данные введенные пользователем
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $newProject = new Project;
        $newProject->name = $request->name;
        $newProject->description = $request->description;
        $newProject->path = $request->path ;
        $newProject->user_id = Auth::user()->id;
        $newProject->remove = true;
        $newProject->save();

        // $path = storage_path().$request->path;
        // File::makeDirectory($path, $mode = 0777, true, true);

        return redirect()->route('account-projects-page');
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
     * Удаление указанного программного проекта из базы данных
     *
     * @param  int  $id Идентификатор программного проекта, который удаляет пользователь
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingProject = Project::find($id);
        if($existingProject){
            File::deleteDirectory(storage_path('local').$existingProject->path);
            $existingProject->delete();
            return "Project delete";
        }

        return "Project not found";
    }

    /**
     * Формирование данных проектных задач для графика
     * 
     * @return array Данные проектных задач для построения графика
     */
    public function liner()
    {
        return [
            'all' => Project::count(),
            'developing' => Project::where(['remove' => false])->count(),
            'remove' => Project::where(['remove' => true])->count(),
        ];
    }
}
