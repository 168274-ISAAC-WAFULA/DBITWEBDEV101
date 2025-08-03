@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 bg-dark text-white min-vh-100">
            <div class="sidebar-sticky pt-3">
                <h4 class="text-center mb-4">Owner Dashboard</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('menu-items.index') }}">Menu Items</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('inventory.index') }}">Inventory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Settings</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Business Overview</h1>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <h5 class="card-title">Monthly Revenue</h5>
                            <p class="card-text display-4">$15,250</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Top Selling Item</h5>
                            <p class="card-text display-4">Burger</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <h5 class="card-title">Inventory Status</h5>
                            <p class="card-text display-4">85% Stocked</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Revenue Chart -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Monthly Revenue</h5>
                </div>
                <div class="card-body">
                    <canvas id="revenueChart" width="100%" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Revenue chart would be implemented here
    const ctx = document.getElementById('revenueChart').getContext('2d');
    // Chart implementation would go here
</script>
@endsection
@endsection
