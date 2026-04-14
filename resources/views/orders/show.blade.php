@extends('layouts.app')

@section('title', 'Order #' . $order->id)

@section('content')
    <h2>Order #{{ $order->id }}</h2>
    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>

    <h3>Order Details</h3>
    <p><strong>Order ID:</strong> #{{ $order->id }}</p>
    <p><strong>Order Date:</strong> {{ $order->created_at->format('M d, Y H:i A') }}</p>
    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>

    <h3>Rice Item Details</h3>
    <p><strong>Item Name:</strong> {{ $order->riceItem->name }}</p>
    <p><strong>Price per Kilogram:</strong> {{ number_format($order->price_per_kg, 2) }}</p>
    <p><strong>Quantity Ordered:</strong> {{ number_format($order->quantity, 2) }} kg</p>

    <h3>Total Amount</h3>
    <p style="font-size: 1.5em;"><strong>{{ number_format($order->total_amount, 2) }}</strong></p>

    @if ($order->payment)
        <h3>Payment Status</h3>
        <p><strong>Payment Status:</strong> {{ ucfirst($order->payment->status) }}</p>
        <p><strong>Payment Amount:</strong> {{ number_format($order->payment->amount, 2) }}</p>
        @if ($order->payment->payment_date)
            <p><strong>Payment Date:</strong> {{ $order->payment->payment_date->format('M d, Y H:i A') }}</p>
        @endif
        @if ($order->payment->payment_method)
            <p><strong>Payment Method:</strong> {{ ucfirst($order->payment->payment_method) }}</p>
        @endif
        @if ($order->payment->status === 'unpaid')
            <p><a href="{{ route('payments.show', $order) }}" class="btn btn-success">Process Payment</a></p>
        @endif
    @endif

    <p>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders</a>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
    </p>
@endsection
