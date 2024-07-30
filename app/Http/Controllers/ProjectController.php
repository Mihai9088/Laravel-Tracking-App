<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function getProjects()
    {

        return Project::all();
    }

    public function index()
    {
        $projects = Project::paginate(3);
        return view('projects.index', ['projects' => $projects]);
    }


    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'project' => 'required|string',

        ]);



        Project::create($request->all());




        return redirect('/projects')->with('message', 'Project created successfully');
    }

    public function update(Project $project, Request $request)
    {
        $request->validate([
            'project' => 'required|string',
        ]);




        $project->update([
            'project' => $request->input('project'),
        ]);

        return redirect('/projects')->with('message', ' Project updated successfully');
    }

    public function edit(Project $project)
    {
        return view('/projects.edit', ['project' => $project]);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/projects')->with('message', 'project deleted successfully');
    }

    public function deleteSelected(Request $request)
    {

        Project::whereIn('id',  $request->input('project'))->delete();
        return redirect('/projects')->with('message', 'projects deleted successfully');
    }
}
