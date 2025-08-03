@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Setting: {{ $setting->key }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('settings.update', $setting->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label">Key</label>
                            <input type="text" class="form-control" value="{{ $setting->key }}" readonly>
                        </div>
                        
                        <div class="mb-3">
                            <label for="value" class="form-label">Value</label>
                            <input type="text" class="form-control" id="value" name="value" value="{{ $setting->value }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $setting->description }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update Setting</button>
                        <a href="{{ route('settings.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
