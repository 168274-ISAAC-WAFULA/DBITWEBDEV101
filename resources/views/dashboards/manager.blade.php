@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 bg-dark text-white min-vh-100">
            <div class="sidebar-sticky pt-3">
                <h4 class="text-center mb-4">Manager Dashboard</h4>
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
                        <a class="nav-link text-white" href="#">Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Reports</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Operations Overview</h1>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <h5 class="card-title">Today's Orders</h5>
                            <p class="card-text display-4">42</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Staff On Duty</h5>
                            <p class="card-text display-4">5</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <h5 class="card-title">Pending Orders</h5>
                            <p class="card-text display-4">8</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning">
                        <div class="card-body">
                            <h5 class="card-title">Low Stock Items</h5>
                            <p class="card-text display-4">3</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Staff Shifts -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Today's Staff Shifts</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Staff Name</th>
                                <th>Position</th>
                                <th>Shift Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Smith</td>
                                <td>Cashier</td>
                                <td>08:00 - 16:00</td>
                                <td><span class="badge bg-success">Active</span></td>
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
