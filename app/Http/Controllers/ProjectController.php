<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'project' => Project::get(),
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
        $newProject->path = $request->path;
        $newProject->user_id = Auth::user()->id;
        $newProject->save();

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
