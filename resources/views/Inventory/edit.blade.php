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

<h1>Edit Inventory</h1>
<a href="{{ url('inventory') }}" class="btn btn-primary float-end">Back</a>

<div class="card-body">
<form action="{{ url('inventory/'.$inventory->inventory_id.'/edit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="prod_img">Product Image</label>
            <input type="file" name="prod_img[]" class="form-control" id="prod_img" multiple/>
            @error('prod_img') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="stock_name">Stock Name</label>
            <input type="text" name="stock_name" id="stock_name" value="{{ $inventory->stock_name }}"/>
            @error('stock_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="prod_category">Product Category</label>
            <input type="text" name="prod_category" id="prod_category" value="{{ $inventory->prod_category }}"/>
            @error('prod_category') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="stock_quantity">Stock Qty</label>
            <input type="text" name="stock_quantity" id="stock_quantity" value="{{ $inventory->stock_quantity }}"/>
            @error('stock_quantity') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

</body>
</html>
