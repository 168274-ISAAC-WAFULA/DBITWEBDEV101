@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Account</div>

                <div class="card-body">
                    <h4>Welcome, {{ auth()->user()->name }}!</h4>
                    <p>You don't have a specific role assigned yet. Please contact the administrator.</p>
                    
                    <div class="mt-4">
                        <h5>Quick Actions</h5>
                        <div class="d-flex gap-3">
                            <a href="{{ route('menu') }}" class="btn btn-outline-primary">View Menu</a>
                            <a href="#" class="btn btn-outline-secondary">My Orders</a>
                            <a href="#" class="btn btn-outline-info">Account Settings</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
