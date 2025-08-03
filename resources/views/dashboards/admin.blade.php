@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 bg-dark text-white min-vh-100">
            <div class="sidebar-sticky pt-3">
                <h4 class="text-center mb-4">Admin Dashboard</h4>
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
                        <a class="nav-link text-white" href="#">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Users</a>
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
                <h1 class="h2">Dashboard Overview</h1>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <h5 class="card-title">Total Orders</h5>
                            <p class="card-text display-4">125</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Today's Revenue</h5>
                            <p class="card-text display-4">$1,250</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <h5 class="card-title">Active Users</h5>
                            <p class="card-text display-4">42</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning">
                        <div class="card-body">
                            <h5 class="card-title">Low Stock Items</h5>
                            <p class="card-text display-4">7</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Orders -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Recent Orders</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ORD-1001</td>
                                <td>John Doe</td>
                                <td>$25.99</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                            </tr>
                            <!-- More rows would be populated dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
