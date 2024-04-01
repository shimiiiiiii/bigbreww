<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses Table</title>
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

<h2>Expenses Table</h2>
<a href="{{ url('/expenses/create') }}" class="btn btn-primary float-end">Create</a>
<a href="{{ url('/adminhome') }}" class="btn btn-primary float-end">Back</a>

<div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Expenses Image</th>
                <th>Expenses Name</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Expenses Price</th>
                <th>Expenses Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expenses as $item)
            <tr>
                <td>
                    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px;">
                        @foreach(explode(',', $item->exp_img) as $image)
                            <img src="{{ asset($image) }}" alt="Product Image" style="max-width: 100%; max-height: 100%;">
                        @endforeach
                    </div>
                </td>
                <td>{{ $item->expenses_name }}</td>
                <td>{{ $item->type_id }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->expenses_price }}</td>
                <td>{{ $item->expenses_date }}</td>
                <td class="action-buttons">
                    <a href="{{ url('expenses/'.$item->expenses_id.'/edit') }}" class="btn btn-success mx-2">Edit</a>
                    <a href="{{ url('expenses/'.$item->expenses_id.'/delete') }}" class="btn btn-danger ms-1">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
