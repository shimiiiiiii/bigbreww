<!-- admin-layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Include any CSS or meta tags specific to your layout -->
    <style>
        /* Example CSS styles */
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 250px;
            background-color: #333;
            color: #fff;
            padding: 20px;
        }
        .content {
            margin-left: 270px; /* Adjust according to your sidebar width */
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <!-- Sidebar content goes here -->
        <h2>Admin Dashboard</h2>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="admin/create">Account</a></li>
            <li><a href="/product">Products</a></li>
            <li><a href="/inventory">Inventory</a></li>
            <li><a href="/expenses">Expenses</a></li>
            <li><a href="#">Orders</a></li>
            <li><a href="#">Sales</a></li>
        </ul>
    </div>
   
</body>
</html>
