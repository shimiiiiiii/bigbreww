<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;
use App\Models\Inventory;
use App\Models\Expenses;


class AdminhomeController extends Controller
{
    public function index()
    {
        return view('admin.adminhome');
    }

    public function indexito()
    {
        $users = User::all(); 
        $users = User::get();
        // return $products;
        return view('admin.adminlang', compact('users'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin.create')->with('status', 'User Created');
    }

    public function edit(int $id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|string|min:6'
        ]);

        User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('status', 'User Updated');
    }

    public function destroy(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('status', 'User Deleted');
    }
}
