@extends('layout')

@section('content')
  <h1>Edit Project</h1>

<form method="POST" action="/projects/{{ $project->id }}">
    @method('PATCH')
    @csrf
    <div>
        <input type="text" name="title" placeholder="Project Title" value={{ $project->title }}>
      </div>
  
      <div>
      <textarea name="description" placeholder="Project description">{{ $project->description }}</textarea>
      </div>

      <button type="submit">Update Project</button>
  </form>

  <form method="POST" action="/projects/{{ $project->id }}">
    @method('DELETE')
    @csrf
    <div>
      <p>{{ $project->title }}</p>
    </div>
  
    <div>
      <p>{{ $project->description }}</p>
    </div>

      <button type="submit">Delete Project</button>
  </form>
@endsection