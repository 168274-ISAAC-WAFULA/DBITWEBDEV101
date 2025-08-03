<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventoryItems = Inventory::orderBy('current_stock', 'asc')->paginate(10);
        return view('inventory.index', compact('inventoryItems'));
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:100',
            'unit' => 'required|string|max:20',
            'current_stock' => 'required|numeric|min:0',
            'minimum_stock' => 'required|numeric|min:0',
            'unit_cost' => 'required|numeric|min:0',
            'supplier' => 'nullable|string|max:100',
            'expiry_date' => 'nullable|date'
        ]);

        Inventory::create($validated);
        return redirect()->route('inventory.index')->with('success', 'Inventory item added successfully');
    }

    // Other CRUD methods (show, edit, update, destroy) would be implemented here
}
