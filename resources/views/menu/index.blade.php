@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Our Menu</h1>
    
    @foreach($categories as $category)
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h2>{{ $category->name }}</h2>
                @if($category->description)
                    <p class="mb-0">{{ $category->description }}</p>
                @endif
            </div>
            
            <div class="card-body">
                <div class="row">
                    @foreach($category->menuItems as $item)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <p class="card-text">{{ $item->description }}</p>
                                    <p class="text-muted">Preparation time: {{ $item->preparation_time }} minutes</p>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="h5 mb-0">${{ number_format($item->price, 2) }}</span>
                                        @auth
                                            <button class="btn btn-sm btn-primary add-to-cart" 
                                                    data-id="{{ $item->id }}"
                                                    data-name="{{ $item->name }}"
                                                    data-price="{{ $item->price }}">
                                                Add to Order
                                            </button>
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">Login to Order</a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>

@auth
@section('scripts')
<script>
    $(document).ready(function() {
        $('.add-to-cart').click(function() {
            // Will implement cart functionality later
            alert('Added ' + $(this).data('name') + ' to your order!');
        });
    });
</script>
@endsection
@endauth
@endsection
