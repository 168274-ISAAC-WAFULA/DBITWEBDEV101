@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Menu Item</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('menu-items.store') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" min="0" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="preparation_time" class="form-label">Preparation Time (minutes)</label>
                            <input type="number" class="form-control" id="preparation_time" name="preparation_time" min="1" required>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="is_available" name="is_available" value="1" checked>
                            <label class="form-check-label" for="is_available">Available</label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Save Menu Item</button>
                        <a href="{{ route('menu-items.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
