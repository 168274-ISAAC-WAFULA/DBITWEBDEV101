<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cafeteria - Fresh Food & Beverages</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            body {
                font-family: 'Inter', sans-serif;
                background: linear-gradient(135deg, #2c1810 0%, #1a0f08 100%);
                color: white;
                overflow-x: hidden;
            }
            
            .hero-section {
                height: 100vh;
                background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('images/cafeteria1.jpg') }}');
                background-size: cover;
                background-position: center;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                position: relative;
            }
            
            .hero-content h1 {
                font-size: 4rem;
                font-weight: 700;
                margin-bottom: 1rem;
                text-shadow: 2px 2px 4px rgba(0,0,0,0.8);
            }
            
            .hero-content p {
                font-size: 1.5rem;
                margin-bottom: 2rem;
                font-weight: 300;
            }
            
            .time-greeting {
                font-size: 1.2rem;
                color: #f4a261;
                margin-bottom: 1rem;
            }
            
            .cta-button {
                background: linear-gradient(45deg, #f4a261, #e76f51);
                color: white;
                padding: 15px 40px;
                border: none;
                border-radius: 50px;
                font-size: 1.1rem;
                font-weight: 600;
                text-decoration: none;
                display: inline-block;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(244, 162, 97, 0.3);
            }
            
            .cta-button:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(244, 162, 97, 0.4);
                color: white;
            }
            
            .navbar {
                background: rgba(0,0,0,0.9);
                backdrop-filter: blur(10px);
                padding: 1rem 0;
                position: fixed;
                top: 0;
                width: 100%;
                z-index: 1000;
            }
            
            .navbar-brand {
                font-size: 1.8rem;
                font-weight: 700;
                color: #f4a261 !important;
            }
            
            .nav-link {
                color: white !important;
                font-weight: 500;
                margin: 0 1rem;
                transition: color 0.3s ease;
            }
            
            .nav-link:hover {
                color: #f4a261 !important;
            }
            
            .auth-buttons .btn {
                margin: 0 0.5rem;
                padding: 8px 20px;
                border-radius: 25px;
                font-weight: 500;
            }
            
            .btn-outline-light {
                border-color: #f4a261;
                color: #f4a261;
            }
            
            .btn-outline-light:hover {
                background-color: #f4a261;
                border-color: #f4a261;
            }
            
            .btn-warning {
                background-color: #f4a261;
                border-color: #f4a261;
            }
            
            .featured-section {
                padding: 80px 0;
                background: #1a0f08;
            }
            
            .section-title {
                text-align: center;
                font-size: 2.5rem;
                font-weight: 600;
                margin-bottom: 3rem;
                color: #f4a261;
            }
            
            .product-card {
                background: rgba(255,255,255,0.1);
                border-radius: 15px;
                padding: 2rem;
                text-align: center;
                transition: transform 0.3s ease;
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255,255,255,0.1);
            }
            
            .product-card:hover {
                transform: translateY(-10px);
            }
            
            .product-card img {
                width: 100%;
                height: 200px;
                object-fit: cover;
                border-radius: 10px;
                margin-bottom: 1rem;
            }
            
            .product-card h3 {
                font-size: 1.5rem;
                font-weight: 600;
                margin-bottom: 1rem;
                color: #f4a261;
            }
            
            .product-card p {
                color: #ccc;
                line-height: 1.6;
            }
            
            .product-description {
                color: #666;
                font-size: 0.95rem;
            }
            
            .time-display {
                background: rgba(0, 0, 0, 0.7);
                padding: 20px;
                border-radius: 15px;
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.2);
                text-align: center;
                margin-bottom: 2rem;
            }
            
            .current-time {
                font-size: 1.2rem;
                font-weight: 600;
                color: var(--accent-color);
                margin-bottom: 0.5rem;
            }
            
            .current-time i {
                margin-right: 8px;
            }
            
            .operating-hours {
                font-size: 1.1rem;
                color: var(--light-text);
                margin-bottom: 0.5rem;
            }
            
            .special-note {
                font-size: 0.95rem;
                color: #FFE4B5;
                font-style: italic;
                padding: 8px 12px;
                background: rgba(255, 215, 0, 0.2);
                border-radius: 8px;
                border-left: 3px solid var(--accent-color);
            }
            
            .special-note i {
                margin-right: 6px;
            }
            
            @media (max-width: 768px) {
                .hero-title {
                    font-size: 2.5rem;
                }
                
                .hero-subtitle {
                    font-size: 1.1rem;
                }
                
                .section-title {
                    font-size: 2rem;
                }
                
                .time-display {
                    padding: 15px;
                    margin-bottom: 1.5rem;
                }
                
                .current-time {
                    font-size: 1rem;
                }
                
                .operating-hours {
                    font-size: 1rem;
                }
                
                .special-note {
                    font-size: 0.9rem;
                }
            }
        </style>
    </head>
    <body>
        @php
            // Set timezone to match user's location (adjust as needed)
            date_default_timezone_set('Africa/Nairobi'); // UTC+3 to match your timezone
            $currentHour = date('H');
            $currentMinute = date('i');
            $currentTime = date('g:i A');
            $currentDate = date('l, F j, Y');
            
            // Determine detailed time periods and set appropriate content
            if ($currentHour >= 5 && $currentHour < 11.30) {
                $timeOfDay = 'morning';
                $timePeriod = 'Morning (5:00 AM - 11:30 AM)';
                $heroImage = 'cafeteria1.jpg';
                $greeting = 'Good Morning! ☀️';
                $description = 'Start your day right with our fresh coffee, breakfast pastries, and energizing morning specials.';
                $specialNote = 'Perfect time for coffee and breakfast!';
                $products = [
                    [
                        'image' => 'cafeteria5.jpg',
                        'title' => 'Fresh Brewed Coffee',
                        'description' => 'Premium roasted coffee beans, espresso, cappuccino, and lattes'
                    ],
                    [
                        'image' => 'cafeteria6.jpg',
                        'title' => 'Breakfast Pastries',
                        'description' => 'Warm croissants, muffins, danish, and freshly baked goods'
                    ],
                    [
                        'image' => 'cafeteria4.jpg',
                        'title' => 'Breakfast Combos',
                        'description' => 'Hearty breakfast plates with eggs, toast, and morning sides'
                    ]
                ];
            } elseif ($currentHour >= 11 && $currentHour < 12) {
                $timeOfDay = 'late morning';
                $timePeriod = 'Late Morning (11:00 AM - 12:00 PM)';
                $heroImage = 'cafeteria2.jpg';
                $greeting = 'Good Late Morning! ☕';
                $description = 'Grab a mid-morning snack or early lunch. Perfect for brunch items and light bites.';
                $specialNote = 'Great time for brunch and mid-morning refreshments!';
                $products = [
                    [
                        'image' => 'cafeteria1.jpg',
                        'title' => 'Brunch Specials',
                        'description' => 'Pancakes, waffles, and brunch favorites available now'
                    ],
                    [
                        'image' => 'cafeteria5.jpg',
                        'title' => 'Coffee & Smoothies',
                        'description' => 'Fresh coffee, iced drinks, and healthy fruit smoothies'
                    ],
                    [
                        'image' => 'cafeteria6.jpg',
                        'title' => 'Light Bites',
                        'description' => 'Bagels, yogurt parfaits, and healthy snack options'
                    ]
                ];
            } elseif ($currentHour >= 12 && $currentHour < 13) {
                $timeOfDay = 'noon';
                $timePeriod = 'Lunch Time (12:00 PM - 1:30 PM)';
                $heroImage = 'cafeteria2.jpg';
                $greeting = 'Lunch Time! 🍽️';
                $description = 'Enjoy our chef-curated lunch specials and hearty meals.';
                $specialNote = 'Peak lunch hours - try our daily specials!';
                $products = [
                    [
                        'image' => 'cafeteria4.jpg',
                        'title' => 'Hot Lunch Specials',
                        'description' => 'Daily rotating menu of hearty lunch favorites and main courses'
                    ],
                    [
                        'image' => 'cafeteria1.jpg',
                        'title' => 'Fresh Salads',
                        'description' => 'Crisp garden salads with premium toppings and dressings'
                    ],
                    [
                        'image' => 'cafeteria6.jpg',
                        'title' => 'Sandwiches & Wraps',
                        'description' => 'Gourmet sandwiches and wraps made with fresh ingredients'
                    ]
                ];
            } elseif ($currentHour >= 13 && $currentHour < 17) {
                $timeOfDay = 'afternoon';
                $timePeriod = 'Afternoon (1:30 PM - 5:00 PM)';
                $heroImage = 'cafeteria6.jpg';
                $greeting = 'Good Afternoon! 🌤️';
                $description = 'Take a break with our light bites, afternoon coffee, and refreshing treats.';
                $specialNote = 'Perfect time for afternoon coffee and snacks!';
                $products = [
                    [
                        'image' => 'cafeteria5.jpg',
                        'title' => 'Afternoon Coffee',
                        'description' => 'Iced coffee, cold brew, and afternoon pick-me-up beverages'
                    ],
                    [
                        'image' => 'cafeteria2.jpg',
                        'title' => 'Light Snacks',
                        'description' => 'Cookies, chips, fruit cups, and healthy afternoon bites'
                    ],
                    [
                        'image' => 'cafeteria1.jpg',
                        'title' => 'Energy Treats',
                        'description' => 'Protein bars, nuts, and energizing snack options'
                    ]
                ];
            } elseif ($currentHour >= 17 && $currentHour < 20) {
                $timeOfDay = 'evening';
                $timePeriod = 'Evening (5:30 PM - 8:00 PM)';
                $heroImage = 'cafeteria3.jpg';
                $greeting = 'Good Evening! 🌆';
                $description = 'Wind down with our dinner specials and evening comfort foods.';
                $specialNote = 'Evening comfort foods and relaxing beverages available!';
                $products = [
                    [
                        'image' => 'cafeteria4.jpg',
                        'title' => 'Dinner Specials',
                        'description' => 'Hearty dinner plates and evening main courses'
                    ],
                    [
                        'image' => 'cafeteria5.jpg',
                        'title' => 'Evening Beverages',
                        'description' => 'Herbal teas, hot chocolate, and soothing evening drinks'
                    ],
                    [
                        'image' => 'cafeteria1.jpg',
                        'title' => 'Sweet Desserts',
                        'description' => 'Cakes, pastries, and sweet treats to end your day perfectly'
                    ]
                ];

            } elseif ($currentHour >= 20 && $currentHour < 22) {
                $timeOfDay = 'night';
                $timePeriod = 'Late Night (8:00 PM - 10:30 PM)';
                $heroImage = 'cafeteria6.jpg';
                $greeting = 'Late Night Bites! 🌙';
                $description = 'Last call for evening treats! Grab desserts and late night snacks.';
                $specialNote = 'Limited menu - closing soon! Grab your favorites now.';
                $products = [
                    [
                        'image' => 'cafeteria1.jpg',
                        'title' => 'Decadent Desserts',
                        'description' => 'House-made cakes, pies, and sweet treats'
                    ],
                    [
                        'image' => 'cafeteria5.jpg',
                        'title' => 'Late Night Drinks',
                        'description' => 'Decaf coffee, herbal teas, and calming beverages'
                    ],
                    [
                        'image' => 'cafeteria2.jpg',
                        'title' => 'Quick Snacks',
                        'description' => 'Grab-and-go snacks and light evening bites'
                    ]
                ];
            } else {
                // Closed hours (10 PM - 5 AM)
                $timeOfDay = 'closed';
                $timePeriod = 'Closed (10:00 PM - 5:00 AM)';
                $heroImage = 'cafeteria4.jpg';
                $greeting = 'We\'re Currently Closed 😴';
                $description = 'Our cafeteria is closed for the night. We\'ll be back bright and early at 5:00 AM with fresh coffee and breakfast!';
                $specialNote = 'See you tomorrow morning! We open at 5:00 AM.';
                $products = [
                    [
                        'image' => 'cafeteria1.jpg',
                        'title' => 'Tomorrow\'s Breakfast',
                        'description' => 'Fresh coffee and breakfast items will be ready at 5:00 AM'
                    ],
                    [
                        'image' => 'cafeteria5.jpg',
                        'title' => 'Morning Coffee',
                        'description' => 'Our baristas will be brewing fresh coffee first thing tomorrow'
                    ],
                    [
                        'image' => 'cafeteria6.jpg',
                        'title' => 'Fresh Pastries',
                        'description' => 'Warm, freshly baked pastries will be available in the morning'
                    ]
                ];
            }
        @endphp

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">🍽️ Cafeteria</a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('menu.general') }}">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                    
                    <div class="ms-3">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                                @if (Route::has('register'))
                                    @php
                    // Determine which time-specific menu to show based on current time
                    $currentHour = date('H');
                    if ($currentHour >= 5 && $currentHour < 11) {
                        $timeSpecificRoute = route('menu.morning');
                    } elseif ($currentHour >= 11 && $currentHour < 12) {
                        $timeSpecificRoute = route('menu.morning'); // Late morning still shows morning menu
                    } elseif ($currentHour >= 12 && $currentHour < 13) {
                        $timeSpecificRoute = route('menu.lunch');
                    } elseif ($currentHour >= 13 && $currentHour < 17) {
                        $timeSpecificRoute = route('menu.afternoon-evening');
                    } elseif ($currentHour >= 17 && $currentHour < 20) {
                        $timeSpecificRoute = route('menu.afternoon-evening');
                    } elseif ($currentHour >= 20 && $currentHour < 22) {
                        $timeSpecificRoute = route('menu.night');
                    } else {
                        $timeSpecificRoute = route('menu.morning'); // Default to morning menu when closed
                    }
                @endphp
                <a href="{{ $timeSpecificRoute }}" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-utensils me-2"></i> Explore Menu
                </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="hero-section" style="background-image: url('{{ asset('images/' . $heroImage) }}');">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <!-- Current Time Display -->
                <div class="time-display mb-4">
                    <div class="current-time">
                        <i class="fas fa-clock"></i> {{ $currentTime }} - {{ $currentDate }}
                    </div>
                    <div class="operating-hours">
                        <strong>{{ $timePeriod }}</strong>
                    </div>
                    @if($specialNote)
                        <div class="special-note">
                            <i class="fas fa-info-circle"></i> {{ $specialNote }}
                        </div>
                    @endif
                </div>
                
                <h1 class="hero-title">{{ $greeting }}</h1>
                <p class="hero-subtitle">{{ $description }}</p>
                <div class="mt-4">
                    @if($timeOfDay !== 'closed')
                        @php
                            // Determine which time-specific menu to show based on current time
                            if ($timeOfDay == 'morning') {
                                $timeSpecificRoute = route('menu.morning');
                            } elseif ($timeOfDay == 'late_morning') {
                                $timeSpecificRoute = route('menu.morning'); // Late morning shows morning menu
                            } elseif ($timeOfDay == 'noon') {
                                $timeSpecificRoute = route('menu.lunch');
                            } elseif ($timeOfDay == 'afternoon') {
                                $timeSpecificRoute = route('menu.afternoon-evening');
                            } elseif ($timeOfDay == 'evening') {
                                $timeSpecificRoute = route('menu.afternoon-evening');
                            } elseif ($timeOfDay == 'night') {
                                $timeSpecificRoute = route('menu.night');
                            } else {
                                $timeSpecificRoute = route('menu.morning'); // Default fallback
                            }
                        @endphp
                        <a href="{{ $timeSpecificRoute }}" class="btn btn-primary btn-lg me-3">Explore Menu</a>
                        <a href="#" class="btn btn-outline-light btn-lg">Order Now</a>
                    @else
                        <a href="{{ route('menu.morning') }}" class="btn btn-outline-light btn-lg me-3">View Tomorrow's Menu</a>
                        <a href="#" class="btn btn-primary btn-lg">Set Reminder</a>
                    @endif
                </div>
            </div>
        </section>

        <!-- Featured Products Section -->
        <section id="products" class="products-section">
            <div class="container">
                <h2 class="section-title">Featured {{ ucfirst($timeOfDay) }} Selections</h2>
                
                <div class="row g-4">
                    @foreach($products as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="product-card">
                                <div class="product-image" style="background-image: url('{{ asset('images/' . $product['image']) }}');"></div>
                                <div class="product-content">
                                    <h3 class="product-title">{{ $product['title'] }}</h3>
                                    <p class="product-description">{{ $product['description'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Hours Section -->
        <section class="py-5 text-center" style="background: rgba(0,0,0,0.8);">
            <div class="container">
                <h3 class="mb-4">Our Hours</h3>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <ul class="list-unstyled">
                            <li class="mb-2"><strong>Monday-Friday:</strong> 6 AM - 10 PM</li>
                            <li class="mb-2"><strong>Saturday:</strong> 7 AM - 10 PM</li>
                            <li><strong>Sunday:</strong> 8 AM - 9 PM</li>
                        </ul>
                        <p class="mt-3">Kitchen closes 30 minutes before closing time</p>
                    </div>
                </div>
            </div>
        </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
