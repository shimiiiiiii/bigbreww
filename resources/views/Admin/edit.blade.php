<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>

@if(session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

<h1>Edit User</h1>
<a href="{{ url('admin') }}" class="btn btn-primary float end">Back</a>

<div class="card-body">
    <form action="{{ url('admin/'.$user->id.'/edit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $user->name }}"/>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $user->email }}"/>
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" value="{{ $user->password }}"/>
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
       
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

</body>
</html>
