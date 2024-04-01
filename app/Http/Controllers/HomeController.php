<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Customer; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $products = Product::all();
    // Assuming you want to pass the first product's ID as $product_id
    $product_id = $products->isNotEmpty() ? $products->first()->id : null;
    return view('home')->with('products', $products)->with('product_id', $product_id);
    
}

    public function adminHome()
    {
        return view('Admin.adminhome');
    }

    public function addToCart(Request $request)
    {
        // Retrieve data from the request
        $user = auth()->user();
    
        // Assuming there's a one-to-one relationship between User and Customer
        // and customer_id is a foreign key in the users table pointing to the customers table
        $customer_id = $user->customer->customer_id;
    
        $product_id = $request->input('product_id');
        $cart_quantity = $request->input('cart_quantity');
        $current_time = now();
    
        $cart = Cart::create([
            'customer_id' => $customer_id,
            'product_id' => $product_id,
            'cart_quantity' => $cart_quantity,
            'created_at' => $current_time,
            'updated_at' => $current_time,
        ]);
        
        // Redirect back or do any other operation upon successful addition
        return redirect('/home')->with('success', 'Item added to cart successfully');
    }
    
    

    

    public function showProduct($productId)
{
    $product = Product::find($productId);
    // Assuming $product contains the required data
    return view('product.show', ['product' => $product]);
}

public function search(Request $request)
{
    $query = $request->input('query');
    $products = Product::where('product_name', 'like', "%$query%")
                        ->orWhere('category', 'like', "%$query%")
                        ->get(['product_id', 'product_name', 'category', 'price', 'product_pic']);
    return view('home.search', compact('products'));
}






}
