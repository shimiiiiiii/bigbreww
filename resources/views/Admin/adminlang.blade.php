<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>
<body>

<h1>User List</h1>
<a href="{{ url('admin/create') }}" class="btn btn-primary float end">Back</a>

<div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th> <!-- Added Action column -->
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
               
                <td class="action-buttons">
            <a href="{{ url('admin/'.$user->id.'/edit') }}" class="btn btn-success mx-2">Edit</a>
            <a href="{{ url('admin/'.$user->id.'/delete') }}" class="btn btn-danger ms-1">Delete</a>
        </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
