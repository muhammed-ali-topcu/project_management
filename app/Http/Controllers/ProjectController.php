<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Dotenv\Validator;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Auth;
use App\Http\Requests\StoreProjectRequest;

class ProjectController extends Controller
{

    public function __construct()
    {
         $this->authorizeResource(Project::class,'project');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (!auth()->user()) return back();
        $user_id = auth()->user()->id;
        $projects = Project::where('owner_id', $user_id)->paginate(15);
        $data = [];
        $data['projects'] = $projects;

        return view('projects.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     public function store(StoreProjectRequest $request)
    {
        //
        $validated = $request->validated();//usning Form Requests
        $project = new Project;
        $project->fill($validated);
        $project->owner_id = auth()->user()->id;
        $project->save();

        return redirect()->action('ProjectController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        $this->authorize('update', $project);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        $user = auth()->user();
        if (!$user->can('update', $project)) abort(403);
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProjectRequest $request, Project $project)
    {
        //
      //  $validated = $this->check_validation($request); clasic validation
        $validated = $request->validated();
        $project->fill($validated);
        $project->save();
        return redirect()->action('ProjectController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
        foreach ($project->tasks as $task)
            $task->delete();
        $project->delete();


        return redirect()->action('ProjectController@index');
    }

    protected function check_validation(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required'

        ]);
        return $validated;
    }
    public function task_store(Request $request, Project $project)
    {
        $task = new Task;
        $task->title = $request->input('task_title');
        $task->completed = $request->input('task_completed') == 'on';
        $task->last_date = $request->input('task_last_date');
        $project->add_task($task);
        return back();// redirect back
    }


}
