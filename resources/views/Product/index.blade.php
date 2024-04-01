<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .product-image-container {
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }
        .product-image {
            max-width: 100px;
            max-height: 100px;
            margin-right: 10px;
        }
        .action-buttons {
            white-space: nowrap;
        }
    </style>
</head>
<body>

<h2>Product Table</h2>
<a href="{{ url('/product/create') }}" class="btn btn-primary float-end">Create</a>
<a href="{{ url('/inventory') }}" class="btn btn-primary float-end">Inventory</a>
<a href="{{ url('/expenses') }}" class="btn btn-primary float-end">Expenses</a>

<div class="card-body">

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Product Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
        @foreach ($products as $product)
    <tr>
        <td>{{ $product->product_name }}</td>
        <td>{{ $product->category }}</td>
        <td>{{ $product->price }}</td>
        <td>
            <div class="product-image-container">
                @foreach(explode(',', $product->product_pic) as $image)
                    <img src="{{ asset($image) }}" alt="Product Image" class="product-image">
                @endforeach
            </div>
        </td>
        <td class="action-buttons">
            <a href="{{ url('product/'.$product->product_id.'/edit') }}" class="btn btn-success mx-2">Edit</a>
            <a href="{{ url('product/'.$product->product_id.'/delete') }}" class="btn btn-danger ms-1">Delete</a>
        </td>
    </tr>
@endforeach


        </tbody>
    </table>

</div>
</body>
</html>
