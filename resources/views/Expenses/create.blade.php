<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Expense</title>
</head>
<body>

@if(session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

<h1>Create New Expense</h1>
<a href="{{ url('expenses') }}" class="btn btn-primary float-end">Back</a>

<div class="card-body">
    <form action="{{ url('expenses/create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exp_img">Expense Image</label>
            <input type="file" name="exp_img[]" class="form-control" id="exp_img" multiple/>
            @error('exp_img') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="expenses_name">Expense Name</label>
            <input type="text" name="expenses_name" id="expenses_name" value="{{ old('expenses_name') }}"/>
            @error('expenses_name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-3">
    <label for="type_id">Type</label>
    <select name="type_id" id="type_id" class="form-control">
        <option value="">Select Type</option>
        <option value="1">Milktea</option>
        <option value="2">FruitTea</option>
        <option value="3">Praf</option>
        <option value="4">Kape</option>
    </select>
    @error('type_id') <span class="text-danger">{{ $message }}</span> @enderror
</div>


        <div class="mb-3">
            <label for="quantity">Quantity</label>
            <input type="text" name="quantity" id="quantity" value="{{ old('quantity') }}"/>
            @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="expenses_price">Expense Price</label>
            <input type="text" name="expenses_price" id="expenses_price" value="{{ old('expenses_price') }}"/>
            @error('expenses_price') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="expenses_date">Expense Date</label>
            <!-- Set the value to the current date using JavaScript -->
            <input type="text" name="expenses_date" id="expenses_date" value="{{ old('expenses_date', date('Y-m-d')) }}" readonly/>
            @error('expenses_date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

<!-- Include Bootstrap JavaScript -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- JavaScript to set the current date -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var currentDate = new Date().toISOString().slice(0,10);
        document.getElementById('expenses_date').value = currentDate;
    });
</script>

<script>
    document.getElementById('type_id').addEventListener('change', function() {
        var type_id = this.value;
        var type_name = '';

        // Map type_id to corresponding type name
        switch (type_id) {
            case '1':
                type_name = 'Milktea';
                break;
            case '2':
                type_name = 'FruitTea';
                break;
            case '3':
                type_name = 'Praf';
                break;
            case '4':
                type_name = 'Kape';
                break;
            default:
                type_name = '';
                break;
        }

        // Display the selected type name
        if (type_name !== '') {
            alert('Selected type: ' + type_name);
        }
    });
</script>


</body>
</html>
