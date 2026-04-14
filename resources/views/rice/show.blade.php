@extends('layouts.app')

@section('title', $rice->name)

@section('content')
    <h2>{{ $rice->name }}</h2>

    <p>
        <a href="{{ route('rice.edit', $rice) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('rice.destroy', $rice) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </p>

    <div>
        <p><strong>Price per KG:</strong> {{ $rice->price_per_kg }}</p>
        <p><strong>Stock Quantity:</strong> {{ $rice->stock_quantity }} kg</p>
        <p><strong>Description:</strong> {{ $rice->description ?? 'No description provided.' }}</p>
    </div>

    @if ($rice->stock_quantity > 0)
        <p><a href="{{ route('orders.create') }}?rice={{ $rice->id }}" class="btn btn-success">Order This Rice</a></p>
    @else
        <p><button class="btn btn-secondary" disabled>Out of Stock</button></p>
    @endif

    <p><a href="{{ route('rice.index') }}" class="btn btn-secondary">Back to Menu</a></p>
@endsection
