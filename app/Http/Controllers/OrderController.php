<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'items')->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $menuItems = MenuItem::where('is_available', true)->get();
        return view('orders.create', compact('menuItems'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:menu_items,id',
            'items.*.quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string'
        ]);

        // Order creation logic would be implemented here
        // This would include calculating totals, creating order items, etc.

        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }

    // Other CRUD methods (show, edit, update, destroy) would be implemented here
}
