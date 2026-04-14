@extends('layouts.app')

@section('title', 'Add Rice Item')

@section('content')
    <h2>Add New Rice Item</h2>

    <form action="{{ route('rice.store') }}" method="POST" style="max-width: 600px;">
        @csrf

        <div class="form-group">
            <label for="name">Rice Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')<span class="error-message">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="price_per_kg">Price per KG</label>
            <input type="number" id="price_per_kg" name="price_per_kg" value="{{ old('price_per_kg') }}" step="0.01" min="0" required>
            @error('price_per_kg')<span class="error-message">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="stock_quantity">Stock Quantity (kg)</label>
            <input type="number" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity') }}" min="0" required>
            @error('stock_quantity')<span class="error-message">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
            @error('description')<span class="error-message">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('rice.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
