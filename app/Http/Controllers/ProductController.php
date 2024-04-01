<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {
        $product_pic = Product::all(); 
        $products = Product::get();
        // return $products;
        return view('product.index', compact('products'));
    }



    public function create()
    {

        return view('product.create');
    }



    
    public function store(Request $request)
{
    $request->validate([
        'product_name' => 'required|max:255|string',
        'category' => 'required|max:255|string',
        'price' => 'required|numeric',
        'product_pic.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Adjusted for image upload
    ]);

    $imagePaths = [];

    if ($request->hasFile('product_pic')) {
        foreach ($request->file('product_pic') as $image) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $imagePaths[] = 'images/' . $imageName;
        }
    }

    // Implode the image paths into a single string
    $imageString = implode(',', $imagePaths);

    Product::create([
        'product_name' => $request->product_name,
        'category' => $request->category,
        'price' => $request->price,
        'product_pic' => $imageString // Save image paths to the database
    ]);

    return redirect('product/create')->with('status', 'Product Created');
}




public function edit(int $product_id)
{
    $products = Product::findorFail($product_id);
    // return $products;
    return view('product.edit', compact('products'));
}




public function update(Request $request, int $product_id)
{

    $request->validate([
        'product_name' => 'required|max:255|string',
        'category' => 'required|max:255|string',
        'price' => 'required|numeric',
        'product_pic.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Adjusted for image upload
    ]);

    $imagePaths = [];

    if ($request->hasFile('product_pic')) {
        foreach ($request->file('product_pic') as $image) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $imagePaths[] = 'images/' . $imageName;
        }
    }

    // Implode the image paths into a single string
    $imageString = implode(',', $imagePaths);

    Product::findorFail($product_id)->update([
        'product_name' => $request->product_name,
        'category' => $request->category,
        'price' => $request->price,
        'product_pic' => $imageString // Save image paths to the database
    ]);

    return redirect()->back()->with('status', 'Product Update');

}




public function destroy(int $product_id)
{
    $products = Product::findorFail($product_id);
    $products->delete();

    return redirect()->back()->with('status', 'Product Deleted');
}

public function search(Request $request)
{
    $query = $request->input('query');
    $products = Product::where('product_name', 'like', "%$query%")
                        ->orWhere('category', 'like', "%$query%")
                        ->get(['product_id', 'product_name', 'category', 'price', 'product_pic']);
    return view('product.search', compact('products'));    
}

}

