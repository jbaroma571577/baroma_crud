@extends('layouts.app')

@section('title', 'Process Payment')

@section('content')
    <h2>Process Payment for Order #{{ $order->id }}</h2>

    <h3>Order Summary</h3>
    <p><strong>Order ID:</strong> #{{ $order->id }}</p>
    <p><strong>Rice Item:</strong> {{ $order->riceItem->name }}</p>
    <p><strong>Quantity:</strong> {{ number_format($order->quantity, 2) }} kg</p>
    <p><strong>Price per kg:</strong> {{ number_format($order->price_per_kg, 2) }}</p>
    <p><strong>Total Amount:</strong> {{ number_format($order->total_amount, 2) }}</p>

    <h3>Payment Information</h3>

    @if ($payment->status === 'paid')
        <p>Payment Completed</p>
        <p>This payment has already been processed.</p>
        @if ($payment->payment_date)
            <p>{{ $payment->payment_date->format('M d, Y H:i A') }}</p>
        @endif
        <p><a href="{{ route('orders.show', $order) }}" class="btn btn-secondary">Back to Order</a></p>
    @else
        <form action="{{ route('payments.process', $order) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="">-- Select a payment method --</option>
                    <option value="cash">Cash Payment</option>
                    <option value="card">Credit/Debit Card</option>
                    <option value="online">Online Payment</option>
                </select>
                @error('payment_method')<span class="error-message">{{ $message }}</span>@enderror
            </div>

            <p>You are confirming that you will pay {{ number_format($payment->amount, 2) }}</p>

            <p>
                <button type="submit" class="btn btn-success">Pay Now</button>
                <a href="{{ route('orders.show', $order) }}" class="btn btn-secondary">Cancel</a>
            </p>
        </form>
    @endif
@endsection
