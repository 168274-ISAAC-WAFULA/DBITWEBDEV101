<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #f4a261;
            --secondary-color: #e76f51;
            --accent-color: #2a9d8f;
            --text-dark: #264653;
            --text-light: #6c757d;
            --bg-light: #f8f9fa;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
        }
        
        .navbar {
            background: rgba(42, 157, 143, 0.95) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: white !important;
            transform: translateY(-1px);
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 4rem 0;
            margin-bottom: 3rem;
        }
        
        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .hero-content p {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }
        
        .time-badge {
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            display: inline-block;
            margin-bottom: 1rem;
        }
        
        .category-filters {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 5px 25px rgba(0,0,0,0.08);
            margin-bottom: 3rem;
        }
        
        .filter-btn {
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            margin: 0.25rem;
            transition: all 0.3s ease;
            font-weight: 500;
        }
        
        .filter-btn:hover,
        .filter-btn.active {
            background: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(244, 162, 97, 0.3);
        }
        
        .featured-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 3rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        }
        
        .featured-title {
            color: var(--text-dark);
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        
        .featured-item {
            background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border: 1px solid rgba(244, 162, 97, 0.2);
            transition: all 0.3s ease;
        }
        
        .featured-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(244, 162, 97, 0.2);
            border-color: var(--primary-color);
        }
        
        .menu-category {
            background: white;
            border-radius: 20px;
            margin-bottom: 2rem;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        
        .menu-category:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(0,0,0,0.12);
        }
        
        .category-header {
            background: linear-gradient(135deg, var(--accent-color) 0%, #20b2aa 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        .category-header h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .menu-item-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid rgba(0,0,0,0.05);
        }
        
        .menu-item-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        
        .item-image {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        
        .item-content {
            padding: 1.5rem;
        }
        
        .item-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }
        
        .item-description {
            color: var(--text-light);
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 1rem;
        }
        
        .item-footer {
            padding: 1rem 1.5rem;
            background: rgba(248, 249, 250, 0.5);
            border-top: 1px solid rgba(0,0,0,0.05);
        }
        
        .item-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--secondary-color);
        }
        
        .order-btn {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .order-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(244, 162, 97, 0.4);
            color: white;
        }
        
        .prep-time {
            background: rgba(42, 157, 143, 0.1);
            color: var(--accent-color);
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .hero-content p {
                font-size: 1rem;
            }
            
            .category-header h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}">🍽️ Cafeteria</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content text-center">
                <div class="time-badge">
                    <i class="fas fa-clock me-2"></i>
                    {{ date('g:i A') }} - {{ date('l, F j, Y') }}
                </div>
                <h1>Our Delicious Menu</h1>
                <p>Discover fresh, quality meals crafted with love for every time of day</p>
            </div>
        </div>
    </section>
    
    <div class="container" style="padding-top: 2rem;">
        <!-- Category Filters -->
        <div class="category-filters">
            <div class="text-center mb-3">
                <h3 class="mb-3">Browse by Category</h3>
                <a href="{{ route('menu') }}" class="filter-btn {{ !request('category') ? 'active' : '' }}">All Items</a>
                @foreach($allCategories as $cat)
                    <a href="{{ route('menu.category', $cat->id) }}" 
                       class="filter-btn {{ request('category') == $cat->id ? 'active' : '' }}">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>
        </div>
        
        <!-- Featured Items Section -->
        @if(isset($featuredItems) && count($featuredItems) > 0)
        <div class="featured-section">
            <h2 class="featured-title">
                @php
                    $timeMessages = [
                        'morning' => '🌅 Morning Favorites',
                        'late_morning' => '☕ Late Morning Specials',
                        'lunch' => '🍽️ Lunch Highlights',
                        'afternoon' => '🌤️ Afternoon Treats',
                        'evening' => '🌆 Evening Delights',
                        'night' => '🌙 Late Night Bites',
                        'closed' => '😴 Tomorrow\'s Preview'
                    ];
                @endphp
                {{ $timeMessages[$timeOfDay] ?? '🍽️ Featured Items' }}
            </h2>
            <div class="row">
                @foreach($featuredItems as $featured)
                <div class="col-md-4 mb-3">
                    <div class="featured-item text-center">
                        <h5 class="mb-2">{{ $featured['name'] }}</h5>
                        <p class="text-muted mb-2">{{ $featured['category'] }}</p>
                        <p class="item-price mb-0">KSh {{ number_format($featured['price']) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- Menu Categories -->
        @forelse($categories as $category)
        <div class="menu-category">
            <div class="category-header">
                <h2>{{ $category->name }}</h2>
                @if($category->description)
                    <p class="mb-0 opacity-75">{{ $category->description }}</p>
                @endif
            </div>
            
            <div class="p-4">
                @if($category->menuItems->count() > 0)
                    <div class="row">
                        @foreach($category->menuItems as $item)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="menu-item-card">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" 
                                         class="item-image" 
                                         alt="{{ $item->name }}">
                                @else
                                    <div class="item-image bg-light d-flex align-items-center justify-content-center">
                                        <i class="fas fa-utensils fa-3x text-muted"></i>
                                    </div>
                                @endif
                                
                                <div class="item-content">
                                    <h5 class="item-title">{{ $item->name }}</h5>
                                    <p class="item-description">{{ $item->description }}</p>
                                    @if($item->preparation_time)
                                        <span class="prep-time">
                                            <i class="fas fa-clock me-1"></i>
                                            {{ $item->preparation_time }} min
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="item-footer d-flex justify-content-between align-items-center">
                                    <span class="item-price">KSh {{ number_format($item->price) }}</span>
                                    @auth
                                        <button class="btn order-btn add-to-cart" 
                                                data-id="{{ $item->id }}"
                                                data-name="{{ $item->name }}"
                                                data-price="{{ $item->price }}">
                                            <i class="fas fa-plus me-1"></i> Add to Order
                                        </button>
                                    @else
                                        <a href="{{ route('login') }}" class="btn order-btn">
                                            <i class="fas fa-sign-in-alt me-1"></i> Login to Order
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="fas fa-utensils fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">No items available in this category</h5>
                    </div>
                @endif
            </div>
        </div>
        @empty
        <div class="text-center py-5">
            <i class="fas fa-search fa-3x text-muted mb-3"></i>
            <h3 class="text-muted">No menu items found</h3>
            <p class="text-muted">Please check back later or contact us for more information.</p>
        </div>
        @endforelse
    </div>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @auth
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const itemName = this.getAttribute('data-name');
                    const itemPrice = this.getAttribute('data-price');
                    
                    // Add loading state
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Adding...';
                    this.disabled = true;
                    
                    // Simulate API call (replace with actual implementation)
                    setTimeout(() => {
                        this.innerHTML = '<i class="fas fa-check me-1"></i> Added!';
                        
                        setTimeout(() => {
                            this.innerHTML = originalText;
                            this.disabled = false;
                        }, 1500);
                        
                        // Show success message
                        showNotification(`${itemName} added to your order!`, 'success');
                    }, 1000);
                });
            });
            
            function showNotification(message, type = 'info') {
                const notification = document.createElement('div');
                notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
                notification.style.cssText = 'top: 100px; right: 20px; z-index: 9999; min-width: 300px;';
                notification.innerHTML = `
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                `;
                
                document.body.appendChild(notification);
                
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 5000);
            }
        });
    </script>
    @endauth
</body>
</html>
