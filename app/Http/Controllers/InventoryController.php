<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory; // Assuming Inventory model is located in the App\Models namespace

class InventoryController extends Controller
{
    public function index()
    {
        $prod_img = Inventory::all(); 
        $inventory = Inventory::get();
        // return $products;
        return view('inventory.index', compact('inventory'));
    }


    public function create()
    {

        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'prod_img.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock_name' => 'required|max:255|string',
            'prod_category' => 'required|max:255|string',
            'stock_quantity' => 'required|numeric'
        ]);
    
        $imagePaths = [];
    
        if ($request->hasFile('prod_img')) {
            foreach ($request->file('prod_img') as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                $imagePaths[] = 'images/' . $imageName;
            }
        }
    
        // Implode the image paths into a single string
        $imageString = implode(',', $imagePaths);
    
        Inventory::create([
            'prod_img' => $imageString,
            'stock_name' => $request->stock_name,
            'prod_category' => $request->prod_category,
            'stock_quantity' => $request->stock_quantity // Save image paths to the database
        ]);
    
        return redirect('inventory/create')->with('status', 'Inventory Created');
    }



    public function edit(int $inventory_id)
{
    $inventory = Inventory::findorFail($inventory_id);
    // return $inventory;
    return view('inventory.edit', compact('inventory'));
}

public function update(Request $request, int $inventory_id)
{
    $request->validate([
        'prod_img.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'stock_name' => 'required|max:255|string',
        'prod_category' => 'required|max:255|string',
        'stock_quantity' => 'required|numeric'
    ]);

    $imagePaths = [];

    if ($request->hasFile('prod_img')) {
        foreach ($request->file('prod_img') as $image) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $imagePaths[] = 'images/' . $imageName;
        }
    }

    // Implode the image paths into a single string
    $imageString = implode(',', $imagePaths);

    Inventory::findorFail($inventory_id)->update([
        'prod_img' => $imageString,
        'stock_name' => $request->stock_name,
        'prod_category' => $request->prod_category,
        'stock_quantity' => $request->stock_quantity // Save image paths to the database
    ]);

    return redirect()->back()->with('status', 'Inventory Update');
}

public function destroy(int $inventory_id)
{
    $inventory = Inventory::findorFail($inventory_id);
    $inventory->delete();

    return redirect()->back()->with('status', 'Inventory Deleted');
}


}
