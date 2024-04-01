<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function checkout(Request $request)
    {
        // Insert order into database
        $order = new Order();
        $order->customer_id = auth()->user()->customer->customer_id;
        $order->shipping_fee = 50;
        $order->status = 'pending';
        $order->date_placed = now();
        $order->date_shipped = now();
        $order->save();

        // Attach selected items to the order
        $order->products()->attach($request->selectedItems);

        // Redirect or respond as needed
        return redirect()->route('cart.show')->with('success', 'Order placed successfully!');
    }
}
