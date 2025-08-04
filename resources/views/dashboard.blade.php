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
            <nav class="flex-1 p-4">
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
                                    <span>Manage Item</span>
                                </a>
                                <a href="#" class="flex items-center space-x-3 p-2 text-sm text-orange-100 hover:text-white transition-colors">
                                    <i class="fas fa-sync text-xs"></i>
                                    <span>Item Bulk Update</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    
                    <li class="pt-2">
                        <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg text-gray-300 hover:text-white transition-colors">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-semibold text-gray-800">Manage Item</h2>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <i class="fas fa-bell text-gray-400 text-lg"></i>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">3</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-gray-600"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Content Area -->
            <main class="flex-1 overflow-y-auto bg-gray-50 p-6">
                <!-- Action Buttons -->
                <div class="mb-6 flex space-x-3">
                    <button class="bg-gray-800 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                        Block
                    </button>
                    <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors">
                        Unblock
                    </button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors">
                        Delete
                    </button>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                        Download List
                    </button>
                </div>
                
                <!-- Table Controls -->
                <div class="mb-4 flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Show</span>
                        <select class="border border-gray-300 rounded px-3 py-1 text-sm">
                            <option>10</option>
                            <option>25</option>
                            <option>50</option>
                        </select>
                        <span class="text-sm text-gray-600">entries</span>
                    </div>
                </div>
                
                <!-- Items Table -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <input type="checkbox" class="rounded">
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Restaurant Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Original Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Discounted Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item Image</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock Availability</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Added By</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Sample Row 1 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="checkbox" class="rounded">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Chicken Fried Rice</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$21.01</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Palm Restaurant - burthankudi@gmail.com</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1.00</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="https://images.unsplash.com/photo-1603133872878-684f208fb84b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Chicken Fried Rice" class="w-12 h-12 rounded-lg object-cover">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">Available</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        <button class="bg-blue-500 text-white px-3 py-1 rounded text-xs hover:bg-blue-600">Edit</button>
                                        <button class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">Delete</button>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Admin</td>
                            </tr>
                            
                            <!-- Sample Row 2 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="checkbox" class="rounded">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Egg Bread Burst</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$21.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">ABC Restaurant - andrewdanson@gmail.com</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">7.00</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">-</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="https://images.unsplash.com/photo-1586190848861-99aa4a171e90?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="Egg Bread Burst" class="w-12 h-12 rounded-lg object-cover">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">Available</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex space-x-2">
                                        <button class="bg-blue-500 text-white px-3 py-1 rounded text-xs hover:bg-blue-600">Edit</button>
                                        <button class="bg-red-500 text-white px-3 py-1 rounded text-xs hover:bg-red-600">Delete</button>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Admin</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination would go here -->
                <div class="mt-6 flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">2</span> of <span class="font-medium">2</span> results
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-3 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-50">Previous</button>
                        <button class="px-3 py-2 text-sm bg-blue-500 text-white rounded-lg">1</button>
                        <button class="px-3 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-50">Next</button>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
