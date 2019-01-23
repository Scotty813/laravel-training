<?php

namespace App\Http\Controllers;

use App\Project;
use App\Events\ProjectCreated;

class ProjectsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        return view('projects.index', [
            'projects' => auth()->user()->projects
        ]);
    }

    public function create() {
        return view('projects.create');
    }

    public function show(Project $project)
    {

        $this->authorize('update', $project);

        return view('projects.show', compact('project'));

    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $project->update(request(['title', 'description']));

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect('/projects');
    }

    public function store()
    {   
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $attributes['owner_id'] = auth()->id();

        $project = Project::create($attributes);

        return redirect('/projects');
    }
}
