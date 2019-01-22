<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <h1>Create a New Project</h1>

  <form method="POST" action="/projects">
    
    @csrf

    <div>
      <input type="text" name="title" placeholder="Project Title" required>
    </div>

    <div>
      <textarea name="description" placeholder="Project description"></textarea>
    </div>

    <div>
      <button type="submit">Create Project</button>
    </div>

    @include('errors')
  </form>

</body>
</html>