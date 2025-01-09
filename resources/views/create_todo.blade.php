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
            
            @csrf<!--protects form from security attacks. -->
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
                   <td>{{ $index + 1 }}</td> <!-- Displaying Serial Number --> <!-- Display the serial number (index starts at 0, so add 1) -->
                   <td>{{ $todo->info }}</td> <!-- Displaying the Todo Info -->
                   <td>
                        <!-- Edit Button -->
                        <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-warning">Edit</a>
                        <!--This refers to the name ('todo.edit') of a route that you defined .
                        ($todo->id) is accessing the ID of the current Todo item, which is unique to that item.
                        -->
                    </td>

                    <td>
                            <!-- For the Delete button -->
                            <form action="{{ route('todo.destroy', $todo->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Todo item?');">
                                <!--POST: Used to send data to the server to be processed (such as creating, updating, or deleting data).-->
                                @csrf <!--ensures security by preventing attacks from malicious websites.-->
                                @method('DELETE')<!-- The @method('DELETE') is a Blade directive in Laravel that allows you to override the HTTP method. 
                                This means that when the form is submitted, 
                                Laravel knows to handle it as a DELETE request, not just a regular POST request.-->
                                
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



