@extends('layouts.app')

@section('content')
    @if(session('message'))
        <div>{{ session('message') }}</div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <h1>Search Results</h1>
                        <form action="{{ route('product.search') }}" method="GET">
                            <input type="text" name="query" placeholder="Search products">
                            <button type="submit">Search</button>
                        </form>

                        @if ($products->isEmpty())
                            <p>No products found.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
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
                                            <td>
                                                <form action="{{ route('cart.add') }}" method="post" id="addToCartForm">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                                    <input type="number" name="cart_quantity" value="1">
                                                    <button type="submit" class="add-to-cart-btn" onclick="addToCart(event)">Add to Cart</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div>
                                <a href="#" class="btn btn-success">Place Order</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function addToCart(event) {
        event.preventDefault();
        let form = event.target.closest('form');
        let productId = form.querySelector('input[name="product_id"]').value;
        let cartQuantity = form.querySelector('input[name="cart_quantity"]').value;
        let customerId = "{{ auth()->user()->customer->customer_id }}"; // Fetch customer_id
        
        // Display fetched values including customer_id in an alert
        alert('Customer ID: ' + customerId + ', Product ID: ' + productId + ', Quantity: ' + cartQuantity);

        // Submit the form
        form.submit();
    }
</script>

@endsection
