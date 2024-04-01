<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;    
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        // $cartItems = Cart::instance('carts')->content();

        // return view('cart.index', ['cartItems'=>$cartItems]);
    }

    // public function store(Request $request)
    // {
    //     $products = Product::findOrFail($request->input(key:'product_id'));
    //     Cart::add(
    //         $products->product_name,
    //         $products->category,
    //         $products->price,
    //         $products->product_pic,
    //         $request->input('quantity'),
    //     );

    //     return redirect()->route(route:home)->with('message', 'Successfully added to Cart.');
    // }

    public function show()
    {
        // Fetch cart data from the database, assuming Cart is your model name
        $carts = Cart::all();

        // Pass cart data to the view
        return view('Cart.cart_table', compact('carts'));
    }
}


