<!DOCTYPE html>
<html>
<head>
    <title>Edit Todo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Edit Todo Item</h2>
    <form method="POST" action="{{ route('todo.update', $todo->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="info">Todo Info:</label>
            <input type="text" name="info" id="info" class="form-control" value="{{ $todo->info }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
</body>
</html>
