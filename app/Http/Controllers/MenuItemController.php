<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::with('category')->paginate(10);
        return view('menu_items.index', compact('menuItems'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('menu_items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'is_available' => 'boolean',
            'preparation_time' => 'required|integer|min:1'
        ]);

        MenuItem::create($validated);
        return redirect()->route('menu-items.index')->with('success', 'Menu item created successfully');
    }

    // Other CRUD methods (show, edit, update, destroy) would be implemented here
}
