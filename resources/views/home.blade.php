@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cafeteria Menu') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Welcome to our Cafeteria!</h3>
                    <p>Browse our menu and place your order.</p>
                    <a href="{{ route('menu') }}" class="btn btn-primary">View Menu</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
