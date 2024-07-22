<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-top: 50px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .add-task-input {
            border-right: 0;
        }
        .add-task-btn {
            border-left: 0;
            background-color: #007bff;
            color: white;
        }
        .add-task-btn:hover {
            background-color: #0056b3;
        }
        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .delete-btn {
            background-color: #dc3545;
            color: white;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Todo List</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('saveItem') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" id="taskInput" name="listItem" class="form-control add-task-input" placeholder="Add a new task">
                        <div class="input-group-append">
                            <button type="submit" class="btn add-task-btn">Save item</button>
                        </div>
                    </div>
                </form>
                <ul class="list-group" id="taskList">
                    @foreach ($listItems as $listItem)
                        <li class="list-group-item">
                            {{ $listItem->name }}
                        

                            <form method="post" action="{{route('deleteItem', $listItem->id)}}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn delete-btn float-right">Delete</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
