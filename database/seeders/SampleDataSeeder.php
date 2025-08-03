<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Inventory;
use App\Models\Table;
use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    public function run()
    {
        // Create categories
        $categories = [
            ['name' => 'Breakfast', 'description' => 'Morning meals'],
            ['name' => 'Lunch', 'description' => 'Midday meals'],
            ['name' => 'Dinner', 'description' => 'Evening meals'],
            ['name' => 'Beverages', 'description' => 'Drinks and refreshments'],
            ['name' => 'Desserts', 'description' => 'Sweet treats']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create menu items
        $menuItems = [
            ['name' => 'Pancakes', 'description' => 'Fluffy pancakes with syrup', 'price' => 8.99, 'category_id' => 1, 'preparation_time' => 15],
            ['name' => 'Burger', 'description' => 'Classic beef burger', 'price' => 12.99, 'category_id' => 2, 'preparation_time' => 20],
            ['name' => 'Pasta', 'description' => 'Spaghetti with marinara sauce', 'price' => 14.99, 'category_id' => 3, 'preparation_time' => 25],
            ['name' => 'Coffee', 'description' => 'Freshly brewed coffee', 'price' => 3.99, 'category_id' => 4, 'preparation_time' => 5],
            ['name' => 'Cheesecake', 'description' => 'New York style cheesecake', 'price' => 7.99, 'category_id' => 5, 'preparation_time' => 10]
        ];

        foreach ($menuItems as $item) {
            MenuItem::create($item);
        }

        // Create inventory items
        $inventory = [
            ['item_name' => 'Flour', 'unit' => 'kg', 'current_stock' => 50, 'minimum_stock' => 10, 'unit_cost' => 1.20],
            ['item_name' => 'Coffee Beans', 'unit' => 'kg', 'current_stock' => 20, 'minimum_stock' => 5, 'unit_cost' => 15.00],
            ['item_name' => 'Beef Patty', 'unit' => 'pieces', 'current_stock' => 100, 'minimum_stock' => 30, 'unit_cost' => 2.50],
            ['item_name' => 'Cheese', 'unit' => 'kg', 'current_stock' => 15, 'minimum_stock' => 5, 'unit_cost' => 8.00]
        ];

        foreach ($inventory as $item) {
            Inventory::create($item);
        }

        // Create tables
        for ($i = 1; $i <= 10; $i++) {
            Table::create([
                'table_number' => 'T' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'capacity' => rand(2, 8),
                'status' => 'available'
            ]);
        }
    }
}
