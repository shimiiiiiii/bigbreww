<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <form id="checkout-form" action="{{ route('checkout') }}" method="POST">
        @csrf
        <table border="1">
            <thead>
                <tr>
                    <!-- <th>Cart ID</th>
                    <th>Customer ID</th> -->
                    <th>Select</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <!-- <th>Select</th> -->
                </tr>
            </thead>
            <tbody>
                <!-- Assume $carts is the array containing cart data from the database -->
                @foreach($carts as $cart)
                <tr>
                    <!-- <td>{{ $cart->cart_id }}</td>
                    <td>{{ $cart->customer_id }}</td> -->
                    <td><input type="checkbox" class="cart-checkbox" name="selectedItems[]" value="{{ $cart->id }}" data-price="{{ $cart->product->price }}" data-quantity="{{ $cart->cart_quantity }}"></td>
                    <td>{{ $cart->product->product_name }}</td>
                    <td>{{ $cart->product->price }}</td>
                    <td>{{ $cart->cart_quantity }}</td>
                    <td>{{ $cart->product->price * $cart->cart_quantity }}</td>
                    <!-- <td><input type="checkbox" class="cart-checkbox" data-price="{{ $cart->product->price }}" data-quantity="{{ $cart->cart_quantity }}"></td> -->
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Calculate and display grand total -->
        <div id="grand-total">
            Grand Total: <span id="grand-total-value">0</span>
        </div>

        <!-- Checkout button -->
        <button type="submit" id="checkout-button">Checkout</button>
    </form>

    <script>
        // Get all checkboxes
        const checkboxes = document.querySelectorAll('.cart-checkbox');

        // Add event listener to each checkbox
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', function() {
                calculateGrandTotal();
            });
        });

        // Function to calculate grand total
        function calculateGrandTotal() {
            let grandTotal = 0;
            checkboxes.forEach((checkbox) => {
                if (checkbox.checked) {
                    const price = parseFloat(checkbox.getAttribute('data-price'));
                    const quantity = parseInt(checkbox.getAttribute('data-quantity'));
                    grandTotal += price * quantity;
                }
            });
            document.getElementById('grand-total-value').innerText = grandTotal.toFixed(2);
        }
    </script>
</body>
</html>
