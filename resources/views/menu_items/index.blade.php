@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Menu Items Management</h1>
        <a href="{{ route('menu-items.create') }}" class="btn btn-primary">Add New Item</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Prep Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menuItems as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name ?? 'Uncategorized' }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>
                                <span class="badge {{ $item->is_available ? 'bg-success' : 'bg-danger' }}">
                                    {{ $item->is_available ? 'Available' : 'Unavailable' }}
                                </span>
                            </td>
                            <td>{{ $item->preparation_time }} mins</td>
                            <td>
                                <a href="{{ route('menu-items.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('menu-items.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{ $menuItems->links() }}
        </div>
    </div>
</div>
@endsection
