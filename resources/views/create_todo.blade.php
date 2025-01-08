<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>My Todo App</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
    crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
    crossorigin="anonymous">
    </script>

</head>

<body>
    <div class="row">
        <div class="col-md-3 m-auto" style="margin-left: 500px">
            <h3>My todo App</h3>
            <form method="post" action="/todo"><!--normally for saving form we use POST  -->
                <!-- form action ->attribute specifies the URL where the form data should be sent for processing when the user submits the form.-->
                <div class="form-group">
                <input type="text"  name="info"placeholder="Enter your todo" required/>
               </div>
            
            @csrf
            <button type="submit" class="btn btn-primary" > Save </button>
            
    
    
            </form><hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 m-auto" style="margin-left: 500px">
            <table class="table">
                <thread>
                    <tr>
                        <th>S.No</th>
                        <th>Todo Items</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr> 
                </thread>
                <tbody>
                @foreach($todos as $index => $todo)
                <tr>
                   <td>{{ $index + 1 }}</td> <!-- Displaying Serial Number --> 
                   <td>{{ $todo->info }}</td> <!-- Displaying the Todo Info -->
                   <td>
                        <!-- Edit Button -->
                        <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-warning">Edit</a>
                    </td>

                    <td>
                            <!-- For the Delete button -->
                            <form action="{{ route('todo.destroy', $todo->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Todo item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</body>
</html>



