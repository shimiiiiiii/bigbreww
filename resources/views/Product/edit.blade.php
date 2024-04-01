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

<h1>Edit Product</h1>
<a href="{{ url('product') }}" class="btn btn-primary float end">Back</a>

<div class="card-body">
    <form action="{{ url('product/'.$products->product_id.'/edit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="product_name" value="{{ $products->product_name }}"/>
            @error('product_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" value="{{ $products->category }}"/>
            @error('category') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="text" name="price" value="{{ $products->price }}"/>
            @error('price') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label>Product Image</label>
            <input type="file" name="product_pic[]" class="form-control" multiple/>
            @error('product_pic') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

</body>
</html>
