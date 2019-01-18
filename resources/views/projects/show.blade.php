@extends('layout')

@section('content')
  <h1>{{ $project->title }}</h1>
  <p>{{ $project->description }}</p>
  <p><a href="/projects/{{ $project->id }}/edit">Edit</a></p>

  @if ($project->tasks->count())
  <div>
    @foreach ($project->tasks as $task)
      <div>
        <form action="/completed-tasks/{{ $task->id }}" method="POST" style="display: inline">

          @if ($task->completed)
              @method('DELETE')
          @endif
          
          @csrf

          <input type="checkbox" onChange="this.form.submit()" name="completed" {{ $task->completed ? 'checked' : '' }}>
        </form>
        <li class="check-list {{ $task->completed ? 'is-complete' : '' }}" style="list-style: none; display: inline;">{{ $task->description }}</li>
      </div>
    @endforeach
  </div>
  @endif
  
  <form action="/projects/{{ $project->id }}/tasks" method="POST">
    @csrf
    <p>New Task</p>
    <input type="text" placeholder="New Task" name="description" required>
    <button type="submit">Add Task</button>

    @include('errors')
  </form>
@endsection