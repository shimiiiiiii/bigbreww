<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@if(session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

<h1>Create New Product</h1>
<a href="{{ url('product') }}" class="btn btn-primary float end">Back</a>

<div class="card-body">
    <form action="{{ url('product/create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="product_name" value="{{ old('product_name') }}"/>
            @error('product_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" value="{{ old('category') }}"/>
            @error('category') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="text" name="price" value="{{ old('price') }}"/>
            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Product Image</label>
            <input type="file" name="product_pic[]" class="form-control" multiple/>
            @error('product_pic') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

</body>
</html>
