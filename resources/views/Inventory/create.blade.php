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

<h1>Create New Inventory</h1>
<a href="{{ url('inventory') }}" class="btn btn-primary float-end">Back</a>

<div class="card-body">
    <form action="{{ url('inventory/create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="prod_img">Product Image</label>
            <input type="file" name="prod_img[]" class="form-control" id="prod_img" multiple/>
            @error('prod_img') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="stock_name">Stock</label>
            <input type="text" name="stock_name" id="stock_name" value="{{ old('stock_name') }}"/>
            @error('stock_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="prod_category">Product Category</label>
            <input type="text" name="prod_category" id="prod_category" value="{{ old('prod_category') }}"/>
            @error('prod_category') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="stock_quantity">Stock Qty</label>
            <input type="text" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity') }}"/>
            @error('stock_quantity') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

</body>
</html>
