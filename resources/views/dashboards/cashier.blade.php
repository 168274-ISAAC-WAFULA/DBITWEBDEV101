@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 bg-dark text-white min-vh-100">
            <div class="sidebar-sticky pt-3">
                <h4 class="text-center mb-4">Cashier Dashboard</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">New Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Active Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Process Payment</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Order Processing</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newOrderModal">
                        Create New Order
                    </button>
                </div>
            </div>

            <!-- Active Orders -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Active Orders</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Customer</th>
                                <th>Items</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ORD-1005</td>
                                <td>Walk-in</td>
                                <td>2 items</td>
                                <td>$18.50</td>
                                <td><span class="badge bg-warning">Preparing</span></td>
                                <td>
                                    <button class="btn btn-sm btn-success">Complete</button>
                                    <button class="btn btn-sm btn-primary">Details</button>
                                </td>
                            </tr>
                            <!-- More rows would be populated dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Quick Payment Form -->
            <div class="card">
                <div class="card-header">
                    <h5>Process Payment</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Order Number</label>
                                <input type="text" class="form-control" placeholder="ORD-XXXX">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Amount</label>
                                <input type="text" class="form-control" placeholder="0.00">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Payment Method</label>
                                <select class="form-select">
                                    <option>Cash</option>
                                    <option>Credit Card</option>
                                    <option>Mobile Money</option>
                                    <option>Wallet</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Amount Tendered</label>
                                <input type="text" class="form-control" placeholder="0.00">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Process Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- New Order Modal -->
<div class="modal fade" id="newOrderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create New Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Order form would go here -->
                <p>Order creation form would be implemented here</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Order</button>
            </div>
        </div>
    </div>
</div>
@endsection
