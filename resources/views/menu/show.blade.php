<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $menuItem->name }} - Cafeteria Menu</title>
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
        
        .item-detail-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(0,0,0,0.1);
            margin-top: 120px;
        }
        
        .item-image {
            height: 400px;
            object-fit: cover;
            width: 100%;
        }
        
        .item-content {
            padding: 3rem;
        }
        
        .item-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }
        
        .item-category {
            background: var(--accent-color);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 1.5rem;
        }
        
        .item-description {
            font-size: 1.1rem;
            line-height: 1.7;
            color: var(--text-light);
            margin-bottom: 2rem;
        }
        
        .item-details {
            background: rgba(248, 249, 250, 0.7);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        .detail-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .detail-item:last-child {
            margin-bottom: 0;
        }
        
        .detail-icon {
            background: var(--primary-color);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }
        
        .item-price {
            font-size: 2rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 2rem;
        }
        
        .order-btn {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: none;
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            width: 100%;
            margin-bottom: 1rem;
        }
        
        .order-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(244, 162, 97, 0.4);
            color: white;
        }
        
        .back-btn {
            background: transparent;
            border: 2px solid var(--accent-color);
            color: var(--accent-color);
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .back-btn:hover {
            background: var(--accent-color);
            color: white;
            transform: translateY(-2px);
        }
        
        @media (max-width: 768px) {
            .item-title {
                font-size: 2rem;
            }
            
            .item-content {
                padding: 2rem;
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
                        <a class="nav-link" href="{{ route('menu') }}">Menu</a>
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
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="item-detail-card">
                    <div class="row g-0">
                        <div class="col-md-6">
                            @if($menuItem->image)
                                <img src="{{ asset('storage/' . $menuItem->image) }}" 
                                     class="item-image" 
                                     alt="{{ $menuItem->name }}">
                            @else
                                <div class="item-image bg-light d-flex align-items-center justify-content-center">
                                    <i class="fas fa-utensils fa-5x text-muted"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="item-content">
                                <span class="item-category">{{ $menuItem->category->name }}</span>
                                <h1 class="item-title">{{ $menuItem->name }}</h1>
                                <p class="item-description">{{ $menuItem->description }}</p>
                                
                                <div class="item-details">
                                    <div class="detail-item">
                                        <div class="detail-icon">
                                            <i class="fas fa-tag"></i>
                                        </div>
                                        <div>
                                            <strong>Price:</strong> KSh {{ number_format($menuItem->price) }}
                                        </div>
                                    </div>
                                    
                                    @if($menuItem->preparation_time)
                                    <div class="detail-item">
                                        <div class="detail-icon">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div>
                                            <strong>Preparation Time:</strong> {{ $menuItem->preparation_time }} minutes
                                        </div>
                                    </div>
                                    @endif
                                    
                                    <div class="detail-item">
                                        <div class="detail-icon">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div>
                                            <strong>Availability:</strong> 
                                            @if($menuItem->is_available)
                                                <span class="text-success">Available</span>
                                            @else
                                                <span class="text-danger">Currently Unavailable</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="item-price">KSh {{ number_format($menuItem->price) }}</div>
                                
                                @auth
                                    @if($menuItem->is_available)
                                        <button class="btn order-btn add-to-cart" 
                                                data-id="{{ $menuItem->id }}"
                                                data-name="{{ $menuItem->name }}"
                                                data-price="{{ $menuItem->price }}">
                                            <i class="fas fa-plus me-2"></i> Add to Order
                                        </button>
                                    @else
                                        <button class="btn order-btn" disabled>
                                            <i class="fas fa-times me-2"></i> Currently Unavailable
                                        </button>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="btn order-btn">
                                        <i class="fas fa-sign-in-alt me-2"></i> Login to Order
                                    </a>
                                @endauth
                                
                                <a href="{{ route('menu') }}" class="btn back-btn">
                                    <i class="fas fa-arrow-left me-2"></i> Back to Menu
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @auth
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartButton = document.querySelector('.add-to-cart');
            
            if (addToCartButton) {
                addToCartButton.addEventListener('click', function() {
                    const itemName = this.getAttribute('data-name');
                    const itemPrice = this.getAttribute('data-price');
                    
                    // Add loading state
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Adding to Order...';
                    this.disabled = true;
                    
                    // Simulate API call (replace with actual implementation)
                    setTimeout(() => {
                        this.innerHTML = '<i class="fas fa-check me-2"></i> Added to Order!';
                        
                        setTimeout(() => {
                            this.innerHTML = originalText;
                            this.disabled = false;
                        }, 2000);
                        
                        // Show success message
                        showNotification(`${itemName} has been added to your order!`, 'success');
                    }, 1500);
                });
            }
            
            function showNotification(message, type = 'info') {
                const notification = document.createElement('div');
                notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
                notification.style.cssText = 'top: 100px; right: 20px; z-index: 9999; min-width: 350px;';
                notification.innerHTML = `
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                `;
                
                document.body.appendChild(notification);
                
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 6000);
            }
        });
    </script>
    @endauth
</body>
</html>
