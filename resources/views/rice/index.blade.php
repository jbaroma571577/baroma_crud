@extends('layouts.app')

@section('title', 'Rice Menu')

@section('content')
    <h2>Rice Menu</h2>
    <p><a href="{{ route('rice.create') }}" class="btn btn-success">Add New Rice</a></p>

    @if ($riceItems->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price (kg)</th>
                    <th>Stock</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($riceItems as $rice)
                    <tr>
                        <td>{{ $rice->name }}</td>
                        <td>{{ $rice->price_per_kg }}</td>
                        <td>{{ $rice->stock_quantity }} kg</td>
                        <td>{{ Str::limit($rice->description, 30) }}</td>
                        <td>
                            <a href="{{ route('rice.show', $rice) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('rice.edit', $rice) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('rice.destroy', $rice) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No rice items available</p>
    @endif
@endsection
