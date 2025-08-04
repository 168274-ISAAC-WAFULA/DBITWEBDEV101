<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        // Set timezone to match user's location
        date_default_timezone_set('Africa/Nairobi');
        $currentHour = date('H');
        
        // Determine current time period for featured items
        $timeOfDay = $this->getCurrentTimePeriod($currentHour);
        
        // Get all categories with their menu items
        $categoriesQuery = Category::with(['menuItems' => function($query) {
            $query->where('is_available', true)->orderBy('name');
        }])->where('is_active', true);
        
        // Filter by category if specified
        if ($request->has('category') && $request->category) {
            $categoriesQuery->where('id', $request->category);
        }
        
        $categories = $categoriesQuery->get();
        $allCategories = Category::where('is_active', true)->get();
        
        // Get featured items based on time of day
        $featuredItems = $this->getFeaturedItemsByTime($timeOfDay);
        
        return view('menu.index', compact('categories', 'allCategories', 'featuredItems', 'timeOfDay'));
    }
    
    public function show($id)
    {
        $menuItem = MenuItem::with('category')->findOrFail($id);
        return view('menu.show', compact('menuItem'));
    }
    
    public function category($categoryId)
    {
        $category = Category::with(['menuItems' => function($query) {
            $query->where('is_available', true)->orderBy('name');
        }])->findOrFail($categoryId);
        
        $allCategories = Category::where('is_active', true)->get();
        
        return view('menu.category', compact('category', 'allCategories'));
    }
    
    public function morningMenu()
    {
        // Set timezone to match user's location
        date_default_timezone_set('Africa/Nairobi');
        $currentHour = date('H');
        $timeOfDay = 'morning';
        
        // Get morning-specific categories and items
        $morningCategories = ['Breakfast', 'Beverages', 'Bakery', 'Coffee'];
        $categories = Category::with(['menuItems' => function($query) {
            $query->where('is_available', true)->orderBy('name');
        }])->whereIn('name', $morningCategories)->where('is_active', true)->get();
        
        $allCategories = Category::where('is_active', true)->get();
        $featuredItems = $this->getFeaturedItemsByTime('morning');
        
        return view('menu.time-specific', compact('categories', 'allCategories', 'featuredItems', 'timeOfDay'));
    }
    
    public function lunchMenu()
    {
        // Set timezone to match user's location
        date_default_timezone_set('Africa/Nairobi');
        $currentHour = date('H');
        $timeOfDay = 'lunch';
        
        // Get lunch-specific categories and items
        $lunchCategories = ['Main Course', 'Salads', 'Sandwiches', 'Soups', 'Beverages'];
        $categories = Category::with(['menuItems' => function($query) {
            $query->where('is_available', true)->orderBy('name');
        }])->whereIn('name', $lunchCategories)->where('is_active', true)->get();
        
        $allCategories = Category::where('is_active', true)->get();
        $featuredItems = $this->getFeaturedItemsByTime('lunch');
        
        return view('menu.time-specific', compact('categories', 'allCategories', 'featuredItems', 'timeOfDay'));
    }
    
    public function afternoonEveningMenu()
    {
        // Set timezone to match user's location
        date_default_timezone_set('Africa/Nairobi');
        $currentHour = date('H');
        $timeOfDay = 'evening';
        
        // Get afternoon/evening-specific categories and items
        $eveningCategories = ['Main Course', 'Desserts', 'Beverages', 'Snacks'];
        $categories = Category::with(['menuItems' => function($query) {
            $query->where('is_available', true)->orderBy('name');
        }])->whereIn('name', $eveningCategories)->where('is_active', true)->get();
        
        $allCategories = Category::where('is_active', true)->get();
        $featuredItems = $this->getFeaturedItemsByTime('evening');
        
        return view('menu.time-specific', compact('categories', 'allCategories', 'featuredItems', 'timeOfDay'));
    }
    
    public function nightMenu()
    {
        // Set timezone to match user's location
        date_default_timezone_set('Africa/Nairobi');
        $currentHour = date('H');
        $timeOfDay = 'night';
        
        // Get night-specific categories and items
        $nightCategories = ['Desserts', 'Beverages', 'Snacks'];
        $categories = Category::with(['menuItems' => function($query) {
            $query->where('is_available', true)->orderBy('name');
        }])->whereIn('name', $nightCategories)->where('is_active', true)->get();
        
        $allCategories = Category::where('is_active', true)->get();
        $featuredItems = $this->getFeaturedItemsByTime('night');
        
        return view('menu.time-specific', compact('categories', 'allCategories', 'featuredItems', 'timeOfDay'));
    }
    
    public function generalMenu()
    {
        // Set timezone to match user's location
        date_default_timezone_set('Africa/Nairobi');
        $currentHour = date('H');
        $timeOfDay = 'general';
        
        // Get all categories and items
        $categories = Category::with(['menuItems' => function($query) {
            $query->where('is_available', true)->orderBy('name');
        }])->where('is_active', true)->get();
        
        $allCategories = Category::where('is_active', true)->get();
        
        // For general menu, show a mix of featured items from all time periods
        $featuredItems = [
            ['name' => 'Fresh Brewed Coffee', 'category' => 'Beverages', 'price' => 150, 'time' => 'Morning'],
            ['name' => 'Hot Lunch Specials', 'category' => 'Main Course', 'price' => 650, 'time' => 'Lunch'],
            ['name' => 'Dinner Specials', 'category' => 'Main Course', 'price' => 750, 'time' => 'Evening'],
            ['name' => 'Decadent Desserts', 'category' => 'Desserts', 'price' => 350, 'time' => 'Night'],
            ['name' => 'Fresh Salads', 'category' => 'Salads', 'price' => 400, 'time' => 'Lunch'],
            ['name' => 'Breakfast Pastries', 'category' => 'Bakery', 'price' => 200, 'time' => 'Morning']
        ];
        
        return view('menu.general', compact('categories', 'allCategories', 'featuredItems', 'timeOfDay'));
    }
    
    private function getCurrentTimePeriod($currentHour)
    {
        if ($currentHour >= 5 && $currentHour < 11) {
            return 'morning';
        } elseif ($currentHour >= 11 && $currentHour < 12) {
            return 'late_morning';
        } elseif ($currentHour >= 12 && $currentHour < 13) {
            return 'lunch';
        } elseif ($currentHour >= 13 && $currentHour < 17) {
            return 'afternoon';
        } elseif ($currentHour >= 17 && $currentHour < 20) {
            return 'evening';
        } elseif ($currentHour >= 20 && $currentHour < 22) {
            return 'night';
        } else {
            return 'closed';
        }
    }
    
    private function getFeaturedItemsByTime($timeOfDay)
    {
        $featuredItems = [];
        
        switch ($timeOfDay) {
            case 'morning':
                $featuredItems = [
                    ['name' => 'Fresh Brewed Coffee', 'category' => 'Beverages', 'price' => 150],
                    ['name' => 'Breakfast Pastries', 'category' => 'Bakery', 'price' => 200],
                    ['name' => 'Breakfast Combos', 'category' => 'Breakfast', 'price' => 450]
                ];
                break;
            case 'late_morning':
                $featuredItems = [
                    ['name' => 'Brunch Specials', 'category' => 'Brunch', 'price' => 550],
                    ['name' => 'Coffee & Smoothies', 'category' => 'Beverages', 'price' => 250],
                    ['name' => 'Light Bites', 'category' => 'Snacks', 'price' => 300]
                ];
                break;
            case 'lunch':
                $featuredItems = [
                    ['name' => 'Hot Lunch Specials', 'category' => 'Main Course', 'price' => 650],
                    ['name' => 'Fresh Salads', 'category' => 'Salads', 'price' => 400],
                    ['name' => 'Sandwiches & Wraps', 'category' => 'Sandwiches', 'price' => 350]
                ];
                break;
            case 'afternoon':
                $featuredItems = [
                    ['name' => 'Afternoon Coffee', 'category' => 'Beverages', 'price' => 150],
                    ['name' => 'Light Snacks', 'category' => 'Snacks', 'price' => 200],
                    ['name' => 'Energy Treats', 'category' => 'Snacks', 'price' => 180]
                ];
                break;
            case 'evening':
                $featuredItems = [
                    ['name' => 'Dinner Specials', 'category' => 'Main Course', 'price' => 750],
                    ['name' => 'Evening Beverages', 'category' => 'Beverages', 'price' => 200],
                    ['name' => 'Sweet Desserts', 'category' => 'Desserts', 'price' => 300]
                ];
                break;
            case 'night':
                $featuredItems = [
                    ['name' => 'Decadent Desserts', 'category' => 'Desserts', 'price' => 350],
                    ['name' => 'Late Night Drinks', 'category' => 'Beverages', 'price' => 180],
                    ['name' => 'Quick Snacks', 'category' => 'Snacks', 'price' => 150]
                ];
                break;
            default:
                $featuredItems = [
                    ['name' => 'Tomorrow\'s Breakfast', 'category' => 'Breakfast', 'price' => 400],
                    ['name' => 'Morning Coffee', 'category' => 'Beverages', 'price' => 150],
                    ['name' => 'Fresh Pastries', 'category' => 'Bakery', 'price' => 200]
                ];
        }
        
        return $featuredItems;
    }
}
