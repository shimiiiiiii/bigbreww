<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;
use App\Models\Types;


 // Adjust the namespace as per your project structure

class ExpensesController extends Controller
{
    public function index()
    {
        $exp_img = Expenses::all();
        $expenses = Expenses::get();
        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {

        return view('expenses.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'exp_img.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'expenses_name' => 'required|max:255|string',
        'type_id' => 'required|string', // Adjust validation rules as per your requirements
        'quantity' => 'required|numeric',
        'expenses_price' => 'required|numeric',
        'expenses_date' => 'required|date'
    ]);

    $imagePaths = [];

    if ($request->hasFile('exp_img')) {
        foreach ($request->file('exp_img') as $image) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $imagePaths[] = 'images/' . $imageName;
        }
    }

    // Implode the image paths into a single string
    $imageString = implode(',', $imagePaths);

  
    $typeExists = Types::where('type_id', $request->type_id)->exists();


   if (!$typeExists) {
       return redirect()->back()->withErrors(['type_id' => 'The selected type is invalid.']);
   }
   
   // If the type_id is valid, proceed with creating the expense record
   Expenses::create([
       'exp_img' => $imageString,
       'expenses_name' => $request->expenses_name,
       'type_id' => $request->type_id,
       'quantity' => $request->quantity,
       'expenses_price' => $request->expenses_price,
       'expenses_date' => $request->expenses_date
   ]);
   


    return redirect('expenses/create')->with('status', 'Expense Created');
}

public function edit(int $expenses_id)
{
    $expenses = Expenses::findorFail($expenses_id);
    // return $inventory;
    return view('expenses.edit', compact('expenses'));
}

public function update(Request $request, int $expenses_id)
{
    $request->validate([
        'exp_img.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'expenses_name' => 'required|max:255|string',
        'type_id' => 'required|string', // Adjust validation rules as per your requirements
        'quantity' => 'required|numeric',
        'expenses_price' => 'required|numeric',
        'expenses_date' => 'required|date'
    ]);

    $imagePaths = [];

    if ($request->hasFile('exp_img')) {
        foreach ($request->file('exp_img') as $image) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $imagePaths[] = 'images/' . $imageName;
        }
    }

    // Implode the image paths into a single string
    $imageString = implode(',', $imagePaths);

  
    $typeExists = Types::where('type_id', $request->type_id)->exists();


   if (!$typeExists) {
       return redirect()->back()->withErrors(['type_id' => 'The selected type is invalid.']);
   }
   
   // If the type_id is valid, proceed with creating the expense record
   Expenses::findorFail($expenses_id)->update([
       'exp_img' => $imageString,
       'expenses_name' => $request->expenses_name,
       'type_id' => $request->type_id,
       'quantity' => $request->quantity,
       'expenses_price' => $request->expenses_price,
       'expenses_date' => $request->expenses_date
   ]);
   


    return redirect('expenses/create')->with('status', 'Expense Update');
}

public function destroy(int $expenses_id)
{
    $expenses = Expenses::findorFail($expenses_id);
    $expenses->delete();

    return redirect()->back()->with('status', 'Expenses Deleted');
}


}
