@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 bg-dark text-white min-vh-100">
            <div class="sidebar-sticky pt-3">
                <h4 class="text-center mb-4">Customer Service</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Order Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Customer Issues</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Reservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Feedback</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Customer Service Dashboard</h1>
            </div>

            <!-- Stats Cards -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <h5 class="card-title">Pending Issues</h5>
                            <p class="card-text display-4">5</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Today's Reservations</h5>
                            <p class="card-text display-4">12</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-info">
                        <div class="card-body">
                            <h5 class="card-title">Avg. Resolution Time</h5>
                            <p class="card-text display-4">15m</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Issues -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Recent Customer Issues</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Ticket #</th>
                                <th>Customer</th>
                                <th>Issue</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>TKT-1002</td>
                                <td>Jane Smith</td>
                                <td>Late order</td>
                                <td><span class="badge bg-warning">In Progress</span></td>
                                <td>
                                    <button class="btn btn-sm btn-primary">View</button>
                                    <button class="btn btn-sm btn-success">Resolve</button>
                                </td>
                            </tr>
                            <!-- More rows would be populated dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Upcoming Reservations -->
            <div class="card">
                <div class="card-header">
                    <h5>Today's Reservations</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Customer</th>
                                <th>Table</th>
                                <th>Party Size</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>19:00</td>
                                <td>John Doe</td>
                                <td>T04</td>
                                <td>2</td>
                                <td><span class="badge bg-success">Confirmed</span></td>
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
