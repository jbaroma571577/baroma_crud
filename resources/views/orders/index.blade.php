@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
    <h2>My Orders</h2>
    <p><a href="{{ route('orders.create') }}" class="btn btn-success">New Order</a></p>

    @if ($orders->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Rice Item</th>
                    <th>Quantity (kg)</th>
                    <th>Price/kg</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->riceItem->name }}</td>
                        <td>{{ number_format($order->quantity, 2) }} kg</td>
                        <td>{{ number_format($order->price_per_kg, 2) }}</td>
                        <td>{{ number_format($order->total_amount, 2) }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order) }}" class="btn btn-primary">View</a>
                            @if ($order->status === 'pending' && $order->payment->status === 'unpaid')
                                <a href="{{ route('payments.show', $order) }}" class="btn btn-success">Pay</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>You haven't placed any orders yet.</p>
        <p><a href="{{ route('orders.create') }}" class="btn btn-success">Create Your First Order</a></p>
    @endif
@endsection
