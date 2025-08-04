<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - {{ config('app.name', 'Cafeteria App') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .sidebar-item:hover { background-color: #f97316; }
        .sidebar-item.active { background-color: #f97316; color: white; }
        .dropdown-enter-active, .dropdown-leave-active {
            transition: all 0.3s ease;
        }
        .dropdown-enter-from, .dropdown-leave-to {
            opacity: 0;
            transform: translateY(-10px);
        }
        .badge-out-of-stock {
            background-color: #fee2e2;
            color: #dc2626;
        }
        .badge-low-stock {
            background-color: #fef3c7;
            color: #d97706;
        }
        .badge-available {
            background-color: #dcfce7;
            color: #16a34a;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white flex flex-col">
            <!-- Logo -->
            <div class="p-6 border-b border-gray-700">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-utensils text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold">INNOVA</h1>
                        <p class="text-xs text-gray-400">FOOD</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="flex-1 p-4 overflow-y-auto">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg text-gray-300 hover:text-white transition-colors">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg text-gray-300 hover:text-white transition-colors">
                            <i class="fas fa-chart-bar"></i>
                            <span>Analytics</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg text-gray-300 hover:text-white transition-colors">
                            <i class="fas fa-edit"></i>
                            <span>Orders</span>
                            <span class="ml-auto bg-orange-500 text-white text-xs px-2 py-1 rounded-full">15</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg text-gray-300 hover:text-white transition-colors">
                            <i class="fas fa-users"></i>
                            <span>Customers</span>
                        </a>
                    </li>
                    
                    <!-- Item Management Section -->
                    <li class="pt-4">
                        <div class="text-xs text-gray-500 uppercase tracking-wider mb-2">Item Management</div>
                        <div class="bg-orange-500 rounded-lg">
                            <a href="#" class="sidebar-item active flex items-center space-x-3 p-3 rounded-lg text-white">
                                <i class="fas fa-box"></i>
                                <span>Item Management</span>
                            </a>
                            <div class="pl-6 pb-2">
                                <a href="#" class="flex items-center space-x-3 p-2 text-sm text-orange-100 hover:text-white transition-colors">
                                    <i class="fas fa-plus-circle text-xs"></i>
                                    <span>Add Item</span>
                                </a>
                                <a href="#" class="flex items-center space-x-3 p-2 text-sm text-white font-medium">
                                    <i class="fas fa-list text-xs"></i>
                                    <span>Manage Items</span>
                                </a>
                                <a href="#" class="flex items-center space-x-3 p-2 text-sm text-orange-100 hover:text-white transition-colors">
                                    <i class="fas fa-sync text-xs"></i>
                                    <span>Item Bulk Update</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    
                    <!-- Inventory Section -->
                    <li class="pt-2">
                        <a href="{{ route('inventory.index') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg text-gray-300 hover:text-white transition-colors">
                            <i class="fas fa-warehouse"></i>
                            <span>Inventory</span>
                            <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">3 Low</span>
                        </a>
                    </li>
                    
                    <li class="pt-2">
                        <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg text-gray-300 hover:text-white transition-colors">
                            <i class="fas fa-file-alt"></i>
                            <span>Reports</span>
                        </a>
                    </li>
                    
                    <li class="pt-2">
                        <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg text-gray-300 hover:text-white transition-colors">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
            <!-- Sidebar Footer -->
            <div class="p-4 border-t border-gray-700 mt-auto">
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-gray-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-gray-300"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-400">Administrator</p>
                    </div>
                </div>
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="mt-3 flex items-center space-x-2 text-sm text-gray-400 hover:text-white transition-colors">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-semibold text-gray-800">Manage Items</h2>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <button id="notifications-button" class="relative">
                                <i class="fas fa-bell text-gray-500 text-lg hover:text-orange-500"></i>
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                            </button>
                            
                            <!-- Notifications Dropdown -->
                            <div id="notifications-dropdown" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-md shadow-lg z-10">
                                <div class="p-4 border-b border-gray-200">
                                    <div class="flex justify-between items-center">
                                        <h3 class="font-medium text-gray-900">Notifications</h3>
                                        <button class="text-sm text-orange-500">Mark all as read</button>
                                    </div>
                                </div>
                                <div class="max-h-60 overflow-y-auto">
                                    <a href="#" class="block px-4 py-3 hover:bg-gray-50 border-b border-gray-100">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 bg-orange-100 p-2 rounded-full">
                                                <i class="fas fa-exclamation-circle text-orange-500"></i>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">Low stock alert</p>
                                                <p class="text-sm text-gray-500">Chicken Fried Rice is running low (3 left)</p>
                                                <p class="text-xs text-gray-400 mt-1">10 minutes ago</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="block px-4 py-3 hover:bg-gray-50 border-b border-gray-100">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 bg-blue-100 p-2 rounded-full">
                                                <i class="fas fa-shopping-cart text-blue-500"></i>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">New order received</p>
                                                <p class="text-sm text-gray-500">Order #ORD-1005 from John Doe</p>
                                                <p class="text-xs text-gray-400 mt-1">25 minutes ago</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="block px-4 py-3 hover:bg-gray-50">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 bg-green-100 p-2 rounded-full">
                                                <i class="fas fa-check-circle text-green-500"></i>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">System updated</p>
                                                <p class="text-sm text-gray-500">Version 2.3.1 installed successfully</p>
                                                <p class="text-xs text-gray-400 mt-1">2 hours ago</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-3 text-center bg-gray-50">
                                    <a href="#" class="text-sm font-medium text-orange-500">View all notifications</a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- User Dropdown -->
                        <div class="relative">
                            <button id="user-menu-button" class="flex items-center space-x-2 focus:outline-none">
                                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-gray-600"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                            </button>
                            
                            <!-- User Dropdown Menu -->
                            <div id="user-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-10">
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-user mr-2"></i> Profile
                                    </a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-cog mr-2"></i> Settings
                                    </a>
                                    <div class="border-t border-gray-100"></div>
                                    <a href="{{ route('logout') }}" 
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Sign out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Content Area -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-white p-4 rounded-lg shadow border-l-4 border-blue-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Total Items</p>
                                <p class="text-2xl font-bold">142</p>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-full">
                                <i class="fas fa-box text-blue-500"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2"><span class="text-green-500">+12%</span> from last month</p>
                    </div>
                    
                    <div class="bg-white p-4 rounded-lg shadow border-l-4 border-green-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Active Items</p>
                                <p class="text-2xl font-bold">128</p>
                            </div>
                            <div class="bg-green-100 p-3 rounded-full">
                                <i class="fas fa-check-circle text-green-500"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2"><span class="text-green-500">+8%</span> from last month</p>
                    </div>
                    
                    <div class="bg-white p-4 rounded-lg shadow border-l-4 border-yellow-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Low Stock</p>
                                <p class="text-2xl font-bold">7</p>
                            </div>
                            <div class="bg-yellow-100 p-3 rounded-full">
                                <i class="fas fa-exclamation-triangle text-yellow-500"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2"><span class="text-red-500">+2</span> from yesterday</p>
                    </div>
                    
                    <div class="bg-white p-4 rounded-lg shadow border-l-4 border-red-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-500">Out of Stock</p>
                                <p class="text-2xl font-bold">3</p>
                            </div>
                            <div class="bg-red-100 p-3 rounded-full">
                                <i class="fas fa-times-circle text-red-500"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2"><span class="text-green-500">-1</span> from yesterday</p>
                    </div>
                </div>
                
                <!-- Action Bar -->
                <div class="bg-white p-4 rounded-lg shadow mb-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                        <div class="flex space-x-3">
                            <button class="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors flex items-center">
                                <i class="fas fa-ban mr-2"></i> Block
                            </button>
                            <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors flex items-center">
                                <i class="fas fa-check mr-2"></i> Unblock
                            </button>
                            <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors flex items-center">
                                <i class="fas fa-trash mr-2"></i> Delete
                            </button>
                        </div>
                        
                        <div class="flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-3">
                            <div class="relative">
                                <input type="text" placeholder="Search items..." class="border border-gray-300 rounded-lg px-4 py-2 pl-10 w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                            </div>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors flex items-center justify-center">
                                <i class="fas fa-download mr-2"></i> Download List
                            </button>
                            <button class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors flex items-center justify-center">
                                <i class="fas fa-plus mr-2"></i> Add Item
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Table Controls -->
                <div class="mb-4 flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="flex items-center space-x-2 mb-3 md:mb-0">
                        <span class="text-sm text-gray-600">Show</span>
                        <select class="border border-gray-300 rounded px-3 py-1 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                        <span class="text-sm text-gray-600">entries</span>
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Filter by status:</span>
                        <select class="border border-gray-300 rounded px-3 py-1 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500">
                            <option>All</option>
                            <option>Available</option>
                            <option>Low Stock</option>
                            <option>Out of Stock</option>
                            <option>Blocked</option>
                        </select>
                    </div>
                </div>
                
                <!-- Items Table -->
                <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <input type="checkbox" class="rounded text-orange-500 focus:ring-orange-500">
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            Item Name
                                            <button class="ml-1 focus:outline-none">
                                                <i class="fas fa-sort text-gray-400 hover:text-orange-500"></i>
                                            </button>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            Price
                                            <button class="ml-1 focus:outline-none">
                                                <i class="fas fa-sort text-gray-400 hover:text-orange-500"></i>
                                            </button>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Restaurant</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Original Price</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Discount</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            Status
                                            <button class="ml-1 focus:outline-none">
                                                <i class="fas fa-sort text-gray-400 hover:text-orange-500"></i>
                                            </button>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Added By</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Sample Row 1 -->
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="checkbox" class="rounded text-orange-500 focus:ring-orange-500">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1603133872878-684f208fb84b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Chicken Fried Rice">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Chicken Fried Rice</div>
                                                <div class="text-sm text-gray-500">#ITEM-1001</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$21.01</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Palm Restaurant</div>
                                        <div class="text-sm text-gray-500">burthankudi@gmail.com</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$10.00</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">$1.00 (10%)</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img src="https://images.unsplash.com/photo-1603133872878-684f208fb84b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Chicken Fried Rice" class="w-12 h-12 rounded-lg object-cover">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full badge-available">Available</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <button class="bg-blue-500 text-white px-3 py-1 rounded text-xs hover:bg-blue-600 transition-colors flex items-center">
                                                <i class="fas fa-edit mr-1"></i> Edit
                                            </button>
                                            <button class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600 transition-colors flex items-center">
                                                <i class="fas fa-trash mr-1"></i> Delete
                                            </button>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex items-center">
                                            <div class="w-6 h-6 bg-gray-200 rounded-full flex items-center justify-center mr-2">
                                                <i class="fas fa-user text-xs text-gray-600"></i>
                                            </div>
                                            Admin
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Sample Row 2 -->
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="checkbox" class="rounded text-orange-500 focus:ring-orange-500">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Egg Bread Burst">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Egg Bread Burst</div>
                                                <div class="text-sm text-gray-500">#ITEM-1002</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$21.00</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">ABC Restaurant</div>
                                        <div class="text-sm text-gray-500">andrewdanson@gmail.com</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$7.00</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">-</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img src="https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Egg Bread Burst" class="w-12 h-12 rounded-lg object-cover">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full badge-low-stock">Low Stock (3)</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <button class="bg-blue-500 text-white px-3 py-1 rounded text-xs hover:bg-blue-600 transition-colors flex items-center">
                                                <i class="fas fa-edit mr-1"></i> Edit
                                            </button>
                                            <button class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600 transition-colors flex items-center">
                                                <i class="fas fa-trash mr-1"></i> Delete
                                            </button>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex items-center">
                                            <div class="w-6 h-6 bg-gray-200 rounded-full flex items-center justify-center mr-2">
                                                <i class="fas fa-user text-xs text-gray-600"></i>
                                            </div>
                                            Admin
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Sample Row 3 -->
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <input type="checkbox" class="rounded text-orange-500 focus:ring-orange-500">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full object-cover" src="https://images.unsplash.com/photo-1565557623262-b51c2513a641?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Vegetable Pizza">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">Vegetable Pizza</div>
                                                <div class="text-sm text-gray-500">#ITEM-1003</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">$15.50</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Pizza Heaven</div>
                                        <div class="text-sm text-gray-500">pizzaheaven@example.com</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$12.00</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">$3.50 (23%)</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img src="https://images.unsplash.com/photo-1565557623262-b51c2513a641?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Vegetable Pizza" class="w-12 h-12 rounded-lg object-cover">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full badge-out-of-stock">Out of Stock</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <button class="bg-blue-500 text-white px-3 py-1 rounded text-xs hover:bg-blue-600 transition-colors flex items-center">
                                                <i class="fas fa-edit mr-1"></i> Edit
                                            </button>
                                            <button class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600 transition-colors flex items-center">
                                                <i class="fas fa-trash mr-1"></i> Delete
                                            </button>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex items-center">
                                            <div class="w-6 h-6 bg-gray-200 rounded-full flex items-center justify-center mr-2">
                                                <i class="fas fa-user text-xs text-gray-600"></i>
                                            </div>
                                            Restaurant Owner
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Pagination -->
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 rounded-b-lg shadow">
                    <div class="flex-1 flex justify-between sm:hidden">
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Previous
                        </a>
                        <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Next
                        </a>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to <span class="font-medium">3</span> of <span class="font-medium">24</span> results
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                                <a href="#" aria-current="page" class="z-10 bg-orange-50 border-orange-500 text-orange-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    1
                                </a>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    2
                                </a>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    3
                                </a>
                                <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                                    ...
                                </span>
                                <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                    8
                                </a>
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Next</span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Add Item Modal (Hidden by default) -->
    <div id="add-item-modal" class="hidden fixed inset-0 overflow-y-auto z-50">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-orange-100 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="fas fa-plus text-orange-500"></i>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Add New Item
                            </h3>
                            <div class="mt-2">
                                <form class="space-y-4">
                                    <div>
                                        <label for="item-name" class="block text-sm font-medium text-gray-700">Item Name</label>
                                        <input type="text" id="item-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                                    </div>
                                    
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="original-price" class="block text-sm font-medium text-gray-700">Original Price</label>
                                            <input type="number" id="original-price" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                                        </div>
                                        <div>
                                            <label for="discounted-price" class="block text-sm font-medium text-gray-700">Discounted Price</label>
                                            <input type="number" id="discounted-price" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label for="restaurant" class="block text-sm font-medium text-gray-700">Restaurant</label>
                                        <select id="restaurant" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                                            <option>Select Restaurant</option>
                                            <option>Palm Restaurant</option>
                                            <option>ABC Restaurant</option>
                                            <option>Pizza Heaven</option>
                                        </select>
                                    </div>
                                    
                                    <div>
                                        <label for="item-image" class="block text-sm font-medium text-gray-700">Item Image</label>
                                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                            <div class="space-y-1 text-center">
                                                <div class="flex text-sm text-gray-600">
                                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-orange-600 hover:text-orange-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-orange-500">
                                                        <span>Upload a file</span>
                                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                                    </label>
                                                    <p class="pl-1">or drag and drop</p>
                                                </div>
                                                <p class="text-xs text-gray-500">
                                                    PNG, JPG, GIF up to 10MB
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label for="stock" class="block text-sm font-medium text-gray-700">Initial Stock</label>
                                        <input type="number" id="stock" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                                    </div>
                                    
                                    <div>
                                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea id="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-orange-500 text-base font-medium text-white hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Add Item
                    </button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle notifications dropdown
        document.getElementById('notifications-button').addEventListener('click', function() {
            document.getElementById('notifications-dropdown').classList.toggle('hidden');
        });

        // Toggle user dropdown
        document.getElementById('user-menu-button').addEventListener('click', function() {
            document.getElementById('user-dropdown').classList.toggle('hidden');
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('#notifications-button') && !event.target.closest('#notifications-dropdown')) {
                document.getElementById('notifications-dropdown').classList.add('hidden');
            }
            
            if (!event.target.closest('#user-menu-button') && !event.target.closest('#user-dropdown')) {
                document.getElementById('user-dropdown').classList.add('hidden');
            }
        });

        // Show add item modal (example functionality)
        document.querySelectorAll('[data-modal-toggle="add-item-modal"]').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('add-item-modal').classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>